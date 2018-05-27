<?php

namespace LaNeta\Http\Controllers\Portal;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Connection;
use LaNeta\Post;
use LaNeta\User;
use Log;
use Auth;


class ConnectionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$filter = Connection::where('user_id', Auth::id())
						->join('users', 'connections.connection', '=', 'users.id')
						->select('connection', 'first_name', 'username', 'email')
						->get();
		
		//dd($filter->all());
		
		$connections = $filter->all();
		
		return view('portal.connections.list', compact("connections"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$users = User::all();
		
		return view('portal.connections.create', compact("users"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//dd($request->all());
		
		$validate = $request->validate([
			'user_id' => 'required',
  			'connection' => 'required'
		]);
		
		$connection = Connection::create($request->all());
		
		event(new FriendFollowed($connection));
		
		return redirect()->route('connections.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \LaNeta\Connection  $connection
	 * @return \Illuminate\Http\Response
	 */
	public function show(Connection $connection)
	{
		$user = User::where('id', $connection->connection)->first();
		return view('portal.connections.show', compact("connection", "user"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \LaNeta\Connection  $connection
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Connection $connection)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \LaNeta\Connection  $connection
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Connection $connection)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \LaNeta\Connection  $connection
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Connection $connection)
	{
		$connection->delete();
		
		return redirect()->route('connections.index');
	}
}
