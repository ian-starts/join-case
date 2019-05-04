<?php

namespace App\Mail;

use App\Deliverable;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeliverableCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Deliverable
     */
    protected $deliverable;

    /**
     * DeliverableCreated constructor.
     *
     * @param Deliverable $deliverable
     */
    public function __construct(Deliverable $deliverable)
    {
        $this->deliverable = $deliverable;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.deliverablecreated')->with(['deliverable' => $this->deliverable]);
    }
}
