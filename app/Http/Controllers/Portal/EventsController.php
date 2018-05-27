<?php

namespace LaNeta\Http\Controllers\Portal;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Events\UserHitEvent;
use LaNeta\Events;
use LaNeta\Event;
use Log;

class EventsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Todo: Don't forget to validate
		
		// Create a user event and register in the data base
		$user_event = Event::create($request->all());

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \LaNeta\Events  $events
	 * @return \Illuminate\Http\Response
	 */
	public function show(Events $events)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \LaNeta\Events  $events
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Events $events)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \LaNeta\Events  $events
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Events $events)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \LaNeta\Events  $events
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Events $events)
	{
		//
	}
}
