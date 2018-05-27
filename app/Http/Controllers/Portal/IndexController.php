<?php

namespace LaNeta\Http\Controllers\Portal;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Notification;
use LaNeta\Post;
use LaNeta\User;
use Log;
use Auth;

class IndexController extends Controller
{
    /**
     * Show the portal index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('Ingreso exitoso a IndexController@index');       
       /*
       'notifications' => Notification::where(['status'=>'new', 'user_id'=> Auth::id()])->orderby('created_at','DESC')->take(5)->get(), 
            'count_notifications' => Notification::where(['status'=>'new', 'user_id'=> Auth::id()])->count()
        */
        return view('portal.index')->with([
            'url' => '/api/postsApi/'
        ]);
    }

    /**
     * [index description]
     * @return [type] [description]
     */
    public function show()
    {
        Log::info('Ingreso exitoso a IndexController@show');
        
        return view('portal.show')->with([
            'url' => '/api/postsApi/'.request()->slug
        ]);
    }    
    
    /**
     * Show the application contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('portal.contact');
    }

    /**
     * Landing page
     */
    public function landing($slug) 
    {       
        $post = Post::where("slug", $slug)->first();
        return view('portal.landing')->with('post', $post);
    }   
}
