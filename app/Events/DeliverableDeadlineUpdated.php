<?php

namespace App\Events;

use App\Deliverable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class DeliverableDeadlineUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Deliverable
     */
    public $deliverable;

    /**
     * DeliverableDeadlineUpdated constructor.
     *
     * @param Deliverable $deliverable
     */
    public function __construct(Deliverable $deliverable)
    {
        $this->deliverable = $deliverable;
    }
}
