<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(
    \App\Deliverable::class,
    function (Faker $faker) {
        return [
            'name' => ['Instagram Story', 'Youtube Video', 'Instagram Picture', 'Tweet'][$faker->numberBetween(0, 3)],
            'status'               => ['pending', 'approved', 'paid'][$faker->numberBetween(0, 2)],
            'concept_deadline'     => $faker->dateTimeBetween('now', '+30 days'),
            'publication_deadline' => $faker->dateTimeBetween('+30 days', '+50 days'),
        ];
    }
);
