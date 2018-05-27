<?php

namespace LaNeta\Http\Controllers\API;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Mail\CommentPost;
use LaNeta\Comment;
use LaNeta\Like;
use Auth;
use Log;
use Mail;
use DB;

use LaNeta\Events\CommentCreatedEvent;

class CommentController extends Controller
{
	public function index($id){
		Log::info('Ingreso exitoso a CommentController@getComments');
		try {
			return Comment::where('post_id', $id)
			->with(['user','likes'])
			->get();
			return 1;
		} catch (Exception $e) {            
			DB::rollBack();    
			Log::error('Error en CommentController@getComments: ' . $e);
			return 0;
		}
	}

	public function store(Request $request){
		
		$this->validate($request, [
			'content' => 'required|Min:3|Max:250'
		]);

		try {
			DB::beginTransaction();
				$request -> request -> add(['user_id' => Auth::id()]);
				$comment = Comment::create($request -> all());
				if ($comment) {
					Mail::to(Auth::user()->email)->send( new CommentPost(Auth::user()->first_name,Auth::user()->last_name));
				}
			DB::commit();
			
			// Dispara el evento que agrega hits a los usuarios (by Darío)
			event(new CommentCreated($comment));
			
			Log::alert('Nuevo registro en CommentController@store');
			return 1;
		} catch (Exception $e) {            
			DB::rollBack();    
			Log::error('Error en CommentController@store: ' . $e); 
			return 0;
		}
	}

	public function update(Request $request, $id){

		$this->validate($request, [
			'content' => 'required|Min:3|Max:250'
		]);

		try { 
			DB::beginTransaction();       	
				$comment = Comment::FindOrFail($id)->update($request -> all());
			DB::commit();
			Log::alert('Modificado registro en CommentController@destroy');   
			return 1;
		} catch (Exception $e) {            
			DB::rollBack();    
			Log::error('Error en CommentController@update: ' . $e); 
			return 0;
		}
	}

	public function destroy($id)
	{
		try {
			DB::beginTransaction();
				Like::where('comment_id', $id)->delete();
				Comment::destroy($id);
			DB::commit();
			Log::alert('Eliminado registro en CommentController@destroy');
		} catch (Exception $e) {
			DB::rollBack();
			Log::error('Error en CommentController@like: ' . $e);
		}
	}

	public function like($comment)
	{
		try {
			DB::beginTransaction();
				$like = Like::where([
					'user_id' => Auth::id(),
					'comment_id' => $comment,
				])->first();  
				if ($like) {
					Like::destroy($like -> id);
				}else{
					$like = Like::create([
						'user_id' => Auth::id(),
						'comment_id' => $comment,
					]);
					
					event(new LikeGiven($like));
				}
			DB::commit();
			Log::info('Proceso exitoso en CommentController@like');
			return 1;
		} catch (Exception $e) {
			DB::rollBack();
			Log::error('Error en CommentController@like: ' . $e); 
			return 0;
		}
	}
}
