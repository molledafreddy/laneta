<?php

namespace LaNeta\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Mail\CommentPost;
use LaNeta\User;
use LaNeta\Post;
use Auth;
use Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with(['users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::FindOrFail($id);
        return view('admin.users.show')->with(['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        try {
            Post::where('user_id', $id)->delete();
            User::FindOrFail($id)->delete();            
            flash('Usuario eliminado exitosamente', 'success');
        } catch (\Exception $e) {
            flash('No se pudo eliminar el registro', 'success');             
        }
        return redirect()->route('users.index');
    }

    public function verify($token)
    {
        $user = User::where('verification_token', $token)->firstOrFail();
        $user->verified = User::USUARIO_VERIFICADO;
        $user->verification_token = null;
        $user->save();

        //$this->guard()->login($user);

        //return $this->registered($request, $user)
          ///              ?: redirect($this->redirectPath());
        //dd("se verifico con exito");
        //
        
        if (Auth::check()) {
            $this -> redirectTo = Auth::user()->username;
        }else{
            flash('Su cuenta fue validada con exíto', 'success');
            return redirect('/');
        }

    }

    public function resend(User $user)
    {
        if ($user->esVerificado()) {
            flash('Su cuenta ya fue verificada', 'success');
            return redirect('/');
        }

        retry(5, function() use ($user) {
                    Mail::to($user)->send( new ConfirmationRegister($user));
                }, 100);
        flash('El correo de verificacion de la re-enviado', 'success');
            return redirect()->back();
    }
}
