<?php

namespace LaNeta\Listeners;

use LaNeta\Events\LikeGiven;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use LaNeta\Post;
use LaNeta\User;
use LaNeta\Event;
use LaNeta\EventUser;
use Log;
class LikeGivenListener
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
     * @param  LikeGiven  $event
     * @return void
     */
    public function handle(LikeGiven $event)
    {
        // Retrieve the like encapsulated into de event.
        $like = $event->like;
        
        // Find the post where the comment was created.
        $post = Post::find($like->post_id);
        
        // Find the user who wrote the post.
        $editor = User::find($post->user_id);
        
        // Find the event type
        $event_type = Event::find(30);
        Log::debug('message event type '.count($event_type));
        
        // Sum the hits of the event type to the user.
        $editor->hits += $event_type->hits;
        
        // Associate the event with the user
        $event_user = new EventUser;
        $event_user->user_id = $editor->id;
        $event_user->event_id = $event_type->id;
        $event_user->save();
    }
}
