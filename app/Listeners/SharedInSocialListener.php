<?php

namespace LaNeta\Listeners;

use LaNeta\Events\SharedInSocial;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SharedInSocialListener
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
     * @param  SharedInSocial  $event
     * @return void
     */
    public function handle(SharedInSocial $event)
    {
        //
    }
}
