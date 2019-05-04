<?php

namespace App\Listeners;

use App\Events\DeliverableDeadlineUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendDeliverableDeadlineUpdatedEmail implements ShouldQueue
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
     * @param  DeliverableDeadlineUpdated $event
     *
     * @return void
     */
    public function handle(DeliverableDeadlineUpdated $event)
    {
//        $event->deliverable->influencers->each(
//            function ($influencer) use ($event) {
//                Mail::to($influencer->email)->send(new \App\Mail\DeliverableDeadlineUpdated($event->deliverable));
//            }
//        );
    }
}
