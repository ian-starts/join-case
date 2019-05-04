<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DeliverablesTableSeeder::class);
        $this->call(InfluencersTableSeeder::class);
        $this->call(DeliverableInfluencerTableSeeder::class);
    }
}
