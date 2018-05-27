<?php

namespace LaNeta\Http\Controllers\Auth;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;

class IndexController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    public function indexChat()
    {
        return view('auth.chats.index');
    }
}
