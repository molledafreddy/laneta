<?php

namespace LaNeta\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Http\Assets\ResourceFunctions;
use LaNeta\Like;
use LaNeta\Comment;
use LaNeta\Post;
use LaNeta\User;
use Auth;
use Log;
use Carbon\Carbon;

class IndexController extends Controller
{
    /**
     * Show the administrator dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	Log::info("ingreso al controlador indexController@index: user: ".Auth::user()->name);
    	$date = Carbon::now();

    	/**
    	 * [$count_posts description:posts stadistis]
    	 * @var [type]
    	 */    	
    	$count_post_day = Post::whereDay('created_at',  date('d'))->count();
    	$count_post_month = Post::whereMonth('created_at',  date('m'))->count();
    	$porcentage_post_day = ResourceFunctions::percentage($count_post_day, $count_post_month);
    	/**
    	 * [$count_like_day description:likes stadistis]
    	 * @var [type]
    	 */
    	$count_like_day = Like::whereDay('created_at',  date('d'))->count();
    	$count_like_month = $count_post_month = Like::whereMonth('created_at',  date('m'))->count();
    	$porcentage_like_day = ResourceFunctions::percentage($count_like_day, $count_like_month);
    	/**
    	 * [$count_comment_day description: ]
    	 * @var [type]
    	 */
    	$count_comment_day = Comment::whereDay('created_at',  date('d') )->count();
    	$count_like_month = $count_comment_month = Comment::whereMonth('created_at',  date('m'))->count();
    	$porcentage_comment_day = ResourceFunctions::percentage($count_comment_day, $count_comment_month);

		$dt_first = Carbon::create($date->format('Y'), $date->format('m'), $date->format('d'), 0, 0, 0);
		$dt_last = Carbon::create($date->format('Y'), $date->format('m'), $date->format('d'), 0, 0, 0);
		
		$posts = Post::with('user')->whereBetween('created_at',[ $dt_first->startOfWeek(), $dt_last->endOfWeek() ])->get();	
		
		$top_users = ResourceFunctions::topPostUser($posts);
			
		return view('admin.index', ['view_group'=>'dashboard'])
        ->with([
        	'count_users' => User::count(),
        	'count_posts' => Post::count(),
        	'count_like_day' => $count_like_day,
        	'count_comment_day' => $count_comment_day,
        	'count_post_day' => $count_post_day,
        	'top_users' => $top_users,
        	'porcentage_post_day'=> $porcentage_post_day,
        	'porcentage_like_day' => $porcentage_like_day,
        	'porcentage_comment_day' => $porcentage_comment_day
        ]);
    }

}
