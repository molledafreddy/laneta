<?php

namespace LaNeta\Http\Controllers\Auth;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\ContactBook;
use LaNeta\Contact;
use Log;
use Auth;
use DB;


class ContactController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$book = ContactBook::where('user_id', Auth::id())->with('contacts')
			->first();
		// dd($book);
		return view('auth.connections.index')->with(['book' => $book]);
	}

	public function conectate(Request $request){
		//dd($request->all());
		
		$validate = $request->validate([
  			'contact' => 'required'
		]);
		
		try {
            DB::beginTransaction();
				$book = ContactBook::where(['user_id' => Auth::id()])
				->first();
				if (count($book) < 1) {						
					$book = ContactBook::create([
						'user_id' => Auth::id(),
					]);
					$connection = Contact::create([
						'user_id' => $request -> contact,
						'contact_book_id' => $book -> id
					]);
					event(new FriendFollowed($connection));
				}else{		
					$contact_exist = Contact::where([
						'user_id' => $request -> contact,
						'contact_book_id' => $book -> id
					])->count();
					if ($contact_exist > 0) {
						Contact::destroy($request -> contact);
					}else{
						$connection = Contact::create([
							'user_id' => $request -> contact,
							'contact_book_id' => $book -> id
						]);
						event(new FriendFollowed($connection));
					}
				}
				Log::info('Proceso exitoso en ConnectionController@conectate');
            DB::commit();
		} catch (\Exception $e) {
            DB::rollBack();    
			Log::error('Error en ConnectionController@conectate: ' . $e);
            flash('Ah ocurrido un error al realizar la operación', 'danger');
		}
		
		return redirect()->back();
	}

}
