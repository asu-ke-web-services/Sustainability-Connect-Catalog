<?php

use Faker\Generator;
use SCCatalog\Models\Lookup\OpportunityStatus;

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

$factory->define(OpportunityStatus::class, function (Generator $faker) {
    return [
        'order'               => $faker->numberBetween(1, 2),
        'name'                => $faker->words(3, true),
    ];
});

$factory->state(OpportunityStatus::class, 'softDeleted', function () {
    return [
        'deleted_at' => \Illuminate\Support\Carbon::now(),
    ];
});
