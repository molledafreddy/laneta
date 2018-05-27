<?php

namespace LaNeta\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use LaNeta\Event;
use LaNeta\EventUser;
use LaNeta\Comment;
use LaNeta\User;
use LaNeta\Post;

class CommentCreatedListener
{
	
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		
	}

	/**
	 * Assigns an event of the proper type to the user indicated 
	 * in the post where the comment was created by inserting a
	 * record in the events_users table, and sum the hits defined 
	 * in the event type to the hits filend of the user who wrote 
	 * the post.
	 *
	 * @param  object  $event
	 * @return void
	 */
	public function handle($event)
	{
		// Retrieve the comment encapsulated into de event.
		$comment = $event->comment;
		
		// Find the post where the comment was created.
		$post = Post::find($comment->post_id);
		
		// Find the user who wrote the post.
		$editor = User::find($post->user_id);
		
		// Find the event type
		$event_type = Event::find(21);
		
		// Sum the hits of the event type to the user.
		$editor->hits += $event_type->hits;
		
		// Associate the event with the user
		$event_user = new EventUser;
		$event_user->user_id = $editor->id;
		$event_user->event_id = $event_type->id;
		$event_user->save();
	}
}
