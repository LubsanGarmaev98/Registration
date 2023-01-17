<?php

namespace App\Listeners;

use App\Jobs\SendEmailJob;

class SendQueueListener
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
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        SendEmailJob::dispatch($event->user);
    }
}
