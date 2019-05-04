<?php

namespace App\Events;

use App\Deliverable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class DeliverableCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Deliverable $deliverable)
    {
        $this->deliverable = $deliverable;
    }
}
