<?php

namespace LaNeta\Http\Controllers\Auth;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use LaNeta\User;
use Mail;
use Auth;
use Log;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        /*if (Auth::check()) {
            $this -> redirectTo = Auth::user()->username;
        }else{
            $this -> redirectTo = '/';
        }
        */
        $this->redirectTo = url()->previous();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect()->back();
        //$this->guard()->login($user);

        //return $this->registered($request, $user)
          //              ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \LaNeta\User
     */
    protected function create(array $data)
    {


        $data['verified'] = User::USUARIO_NO_VERIFICADO;
        $data['verification_token'] = User::generarVerificationToken();
        $data['password'] = bcrypt($data['password']);
            
        $user = User::create($data);
        
        if ($user) {
        flash('Se envio un correo para la confirmacion de su cuenta', 'success');
        //Mail::to($data['email'])->send(new ConfirmationRegister($data['first_name'],$data['last_name']));
 
        }else{
            flash('Ocurrio un error al registrar', 'error');
        }

    }

    
}
