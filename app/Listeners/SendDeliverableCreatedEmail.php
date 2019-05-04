<?php

namespace App\Listeners;

use App\Events\DeliverableCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDeliverableCreatedEmail
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
     * @param  DeliverableCreated  $event
     * @return void
     */
    public function handle(DeliverableCreated $event)
    {
        // TODO: SEND DELIVERABLE CREATED EMAIL
    }
}
