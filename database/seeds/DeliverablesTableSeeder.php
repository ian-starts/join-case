<?php

use Illuminate\Database\Seeder;

class DeliverablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Advertiser::class, 3)->create()->each(
            function (\App\Advertiser $advertiser) {
                $advertiser->campaigns()->saveMany(
                    factory(\App\Campaign::class, 2)->make()
                )->each(
                    function (\App\Campaign $campaign) {
                        $campaign->deliverables()->saveMany(factory(\App\Deliverable::class, 6)->make());
                    }
                );
            }
        );
    }
}
