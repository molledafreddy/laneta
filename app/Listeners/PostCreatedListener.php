<?php

namespace LaNeta\Listeners;

use LaNeta\Events\PostCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreatedListener
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
	 * @param  PostCreated  $event
	 * @return void
	 */
	public function handle(PostCreated $event)
	{
		// Retrieve the post from the event.
		$post = $event->post;
		
		// Find the user who wrote the post.
		$editor = User::find($post->user_id);
		
		// Find the event type
		$event_type = Event::find(28);
		
		// Sum the hits of the event type to the user.
		$editor->hits += $event_type->hits;
		
		// Associate the event with the user
		$event_user = new EventUser;
		$event_user->user_id = $editor->id;
		$event_user->event_id = $event_type->id;
		$event_user->save();
	}
}
