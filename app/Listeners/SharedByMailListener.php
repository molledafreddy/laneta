<?php

namespace LaNeta\Listeners;

use LaNeta\Events\SharedByMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SharedByMailListener
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
     * @param  SharedByMail  $event
     * @return void
     */
    public function handle(SharedByMail $event)
    {
        //
    }
}
