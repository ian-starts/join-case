<?php

namespace App\Listeners;

use App\Events\DeliverableDeadlineUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDeliverableDeadlineUpdatedEmail
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
     * @param  DeliverableDeadlineUpdated  $event
     * @return void
     */
    public function handle(DeliverableDeadlineUpdated $event)
    {
        // TODO: SEND EMAIL
    }
}
