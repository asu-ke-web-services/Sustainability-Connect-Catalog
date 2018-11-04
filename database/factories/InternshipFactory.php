<?php

use Carbon\Carbon;
use Faker\Generator;
use SCCatalog\Models\Opportunity\Internship;

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

$factory->define(Internship::class, function (Generator $faker) {
    return [
		'name'                  => $faker->words(3, true),
		'opportunity_status_id' => 9,
		'description'           => $faker->words(4, true),
    ];
});

$factory->state(Internship::class, 'inactive', function () {
    return [
        'opportunity_status_id' => 8,
    ];
});

$factory->state(Internship::class, 'softDeleted', function () {
    return [
        'deleted_at' => Carbon::now(),
    ];
});
