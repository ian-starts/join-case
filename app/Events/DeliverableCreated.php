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
     * @var Deliverable
     */
    public $deliverable;

    /**
     * DeliverableCreated constructor.
     *
     * @param Deliverable $deliverable
     */
    public function __construct(Deliverable $deliverable)
    {
        $this->deliverable = $deliverable;
    }
}
