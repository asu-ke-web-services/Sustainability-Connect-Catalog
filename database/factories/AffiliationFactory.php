<?php

use Faker\Generator;
use SCCatalog\Models\Lookup\Affiliation;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Affiliation::class, function (Generator $faker) {
    return [
        'opportunity_type_id' => '1',
        'order'               => $faker->numberBetween(1, 2),
        'name'                => $faker->words(3, true),
        'access_control'      => $faker->boolean(20),
    ];
});

$factory->state(Affiliation::class, 'softDeleted', function () {
    return [
        'deleted_at' => \Illuminate\Support\Carbon::now(),
    ];
});
