<?php

namespace App\Console\Commands;

use App\Deliverable;
use App\Influencer;
use App\Mail\DeliverableReminder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDeliverablesReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'join:send_deliverables_reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminders to influencers who have not yet sent their shit';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws \Exception
     */
    public function handle()
    {
        $compareDate = (new \DateTime())->add(new \DateInterval('P7D'));
        Deliverable::all()->each(
            function (Deliverable $deliverable) use ($compareDate) {
                if (($deliverable->publication_deadline < $compareDate || $deliverable->concept_deadline < $compareDate)
                    && $deliverable->status === 'pending') {
                    $deliverable->influencers->each(
                        function (Influencer $influencer) use ($deliverable) {
                            Mail::to($influencer->email)->send(new DeliverableReminder($deliverable));
                        }
                    );
                }
            }
        );
    }
}
