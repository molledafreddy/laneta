<?php

namespace LaNeta\Listeners;

use LaNeta\Events\FriendFollowed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FriendFollowedListener
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  FriendFollowed  $event
	 * @return void
	 */
	public function handle(FriendFollowed $event)
	{
		// Retrieve the connection from event
		$connection = $event->connection;
		
		// Find the user who was followed
		$editor = User::find($connection->connection);
		
		// Find the event type
		$event_type = Event::find(29);
		
		// Sum the hits of the event type to the user.
		$editor->hits += $event_type->hits;
		
		// Associate the event with the user
		$event_user = new EventUser;
		$event_user->user_id = $editor->id;
		$event_user->event_id = $event_type->id;
		$event_user->save();
	}
}
