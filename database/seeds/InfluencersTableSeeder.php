<?php

use Illuminate\Database\Seeder;

class InfluencersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Influencer::class, 5)->create();
    }
}
