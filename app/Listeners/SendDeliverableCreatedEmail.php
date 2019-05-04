<?php

namespace App\Listeners;

use App\Events\DeliverableCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendDeliverableCreatedEmail implements ShouldQueue
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
     * @param  DeliverableCreated $event
     *
     * @return void
     */
    public function handle(DeliverableCreated $event)
    {

//        Mail::to($event->deliverable->campaign->advertiser->email)->send(
//            new \App\Mail\DeliverableCreated($event->deliverable)
//        );
    }
}
