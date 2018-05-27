<?php

namespace LaNeta\Http\Controllers\Portal;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Post;
use LaNeta\User;
use LaNeta\Contact;
use LaNeta\ContactBook;
use Auth;
use DB;
use Log;

class ProfileController extends Controller
{   
    /**
     * Show the portal index.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        try {
            Log::info('Ingreso exitoso a IndexController@show');
            $user = User::where('username', $request -> username)->first();
            if (count($user) > 0) {            	
				$book = ContactBook::where('user_id', Auth::id())->first();
				if (count($book) < 1) {
					$is_friend = false;
				}else{
					$contact_exist = Contact::where([
						'user_id' => $user -> id,
						'contact_book_id' => $book -> id
					])->count();

					if($contact_exist > 0){
						$is_friend = true;
					}else{
						$is_friend = false;
					}
				}

                Log::info('Ingreso del usuario ' . Auth::id() . ' al perfil de ' . $request -> username);
                return view('portal.profile')->with([
                    'user' => $user,
                    'url' => '/api/postsApi/'. $user -> id . '/user',
					'is_friend' => $is_friend
                ]);
            }else{
                flash('El susuario especificado no existe', 'warning');
                Log::alert('El usuario ' . Auth::id() . ' intentó acceder al usuario inexistente ' . $request -> username . ' en ProfileController@user');
                return redirect()->route('portal.index');
            }            
        } catch (\Exception $e) {           
            Log::error('Ah ocurrido un error en ProfileController@profile: ' . $e );
            flash('Ah ocurrido un error al realizar la operación', 'danger');
            return redirect()->route('portal.index');
        }
    }

	public function edit($username)
	{
		try {
			if ($username == Auth::user() -> username) {
				$user = User::where('username', $username)->first();
				Log::info('El usuario ' . Auth::user() -> username . ' accedió a su configuración');
				return view('auth.profile.edit')->with(['user' => $user]);  
			}else{
				Log::alert('El usuario '. Auth::user() -> username . ' intento ingresar a la configuración del usuario' . $username);
			}    
		} catch (\Exception $e) {
			Log::error('Ah ocurrido un error en ProfileController@user: ' . $e );
			flash('Ah ocurrido un error al realizar la operación', 'danger');
			return back();
		}
	}

	public function update(Request $request, $username)
	{        
		try {
			if ($username == Auth::user() -> username) {
				DB::beginTransaction();
					$user = User::where('username', $request->username)->first();
					$user -> update($request->all());
					Log::info('Proceso exitoso en EventController@update');
					flash('Operación exitosa', 'success');  
				DB::commit();
				return redirect()->route('profile', $username);
			}else{
				Log::alert('El usuario '. Auth::user() -> username . ' intento ingresar a la configuración del usuario' . $username);   
				return redirect('/');        
			}
		} catch (Exception $e) {           
			DB::rollBack();   
			Log::error('Ah ocurrido un error en ProfileController@user: ' . $e );
			flash('Ah ocurrido un error al realizar la operación', 'danger');
			return redirect('/');
		}
	}
}
