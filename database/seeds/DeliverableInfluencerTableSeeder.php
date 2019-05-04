<?php

use Illuminate\Database\Seeder;

class DeliverableInfluencerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $influencers = \App\Influencer::all();
        \App\Deliverable::all()->each(
            function (\App\Deliverable $deliverable) use ($influencers) {
                $deliverable->influencers()->save($influencers[rand(0,count($influencers)-1)]);
            }
        );
    }
}
