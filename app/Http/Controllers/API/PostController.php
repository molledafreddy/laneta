<?php

namespace LaNeta\Http\Controllers\API;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Post;
use LaNeta\Like;
use LaNeta\Events\LikeGiven;
use Auth;
use Log;
use DB;

class PostController extends Controller
{
	public function index(){

		Log::info('Ingreso exitoso a PostController@index');
		$lastId=0;
		$posts = Post::with('comments','likes','user','media')
		->orderBy('created_at', 'desc')->skip(0)->take(10)
		->get();

		foreach ($posts as $key => $value) {
		   $lastId =    $value->id;
		}
		Log::debug('ultimo id'.$lastId);
		return ['posts'=> $posts,
			'lastId' => $lastId,
		];
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($slug)
	{
		
		try {
			 Log::info('Ingreso exitoso a PostController@show');
			
			$post_one = Post::where('slug', $slug)
			->with('comments', 'likes','user')
			->get();

			$posts_all = Post::with('comments','likes','user')
			->orderBy('created_at', 'desc')->take(9)
			->get();
			$posts = $post_one->concat($posts_all);
			
			foreach ($posts as $key => $value) {
			   $lastId =    $value->id;
			}

			return [
				'posts'=> $posts,
				'lastId' => $lastId
			];
								
		} catch (\Exception $e) {           
			Log::error('Ah ocurrido un error en PortalController@user: ' . $e );
			flash('Ah ocurrido un error al realizar la operación', 'danger');
			return redirect()->route('portal.index');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		try {
			if ($request -> title) {
				$newSlug = str_replace([' ','!','.',',','*','/','?','"', '\''], '-', strtolower($request -> title));
				$request -> merge(['slug' => $newSlug]);
			}
			Post::FindOrFail($id)->update($request->all());
			Log::alert('Proceso exitoso en PostController@update');
			return 1;
		} catch (\Exception $e) {
			Log::error('Ah ocurrido un error en PostController@update: ' . $e );
			return 0;
		}
	}

	public function like($id)
	{
		try {
			DB::beginTransaction();
				$like = Like::where([
					'user_id' => Auth::id(),
					'post_id' => $id,
				])->first();  
				if ($like) {
					Like::destroy($like -> id);
				}else{
					$like = Like::create([                      
						'user_id' => Auth::id(),
						'post_id' => $id,
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


	public function postsUser($id){
		Log::info('Ingreso exitoso a PostController@postUser');

		$posts = Post::with('comments','likes','user', 'media')
		->where('user_id', $id)
		->orderBy('created_at', 'desc')
		->skip(0)
		->take(10)
		->get();

		foreach ($posts as $key => $value) {
		   $lastId =    $value->id;
		}
		return ['posts'=> $posts,
			'lastId' => $lastId,
		];
	}

	/**
	 * [scroll description:infinity scroll]
	 * @param  Request $request [description: id last post]
	 * @return [type]           [description]
	 */
	public function scroll(Request $request,$id)
	{

		Log::info('Ingreso exitoso a PostController@scroll');
		
		$lastId=0;
		if($request->ajax())
		{


			$posts = Post::with('comments')->with('likes')->with('user')->with('media')->orderBy('created_at', 'desc')
			->where("id", ">", $id)->take(10)->get();
			
			if(count($posts) > 0)
			{
				foreach ($posts as $key => $value) {
				   $lastId =    $value->id;
				}
				Log::debug('ultimo id scroll'.$lastId);
				$token = \Session::token();
				return response()->json([
						"response" => true,
						"posts" => $posts,
						"lastId" => $lastId
					]
				);
			}
 
			return response()->json([
					"response" => false
				]
			);
		}
 
		abort(403);
	}

}
