<?php

namespace LaNeta\Listeners;

use LaNeta\Events\SharedLink;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SharedLinkListener
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
     * @param  SharedLink  $event
     * @return void
     */
    public function handle(SharedLink $event)
    {
        //
    }
}
