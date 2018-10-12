<?php

use Faker\Generator;
use Illuminate\Support\Carbon;
use Webpatser\Uuid\Uuid;
use SCCatalog\Models\Opportunity\Opportunity;
use SCCatalog\Models\Opportunity\Project;

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

$factory->define(Opportunity::class, function (Generator $faker) {
    return [
        'name'                  => $faker->words(3, true),
        'opportunity_status_id' => 4,
        'is_hidden'             => false,
        'description'           => $faker->words(4, true)
    ];
});

$factory->state(Opportunity::class, 'hidden', function () {
    return [
        'hidden' => true,
    ];
});

$factory->state(Opportunity::class, 'active', function () {
    return [
        'opportunity_status_id' => $faker->numberBetween(3, 6),
    ];
});

$factory->state(Opportunity::class, 'closed', function () {
    return [
        'opportunity_status_id' => 7,
    ];
});

$factory->state(Opportunity::class, 'softDeleted', function () {
    return [
        'deleted_at' => Carbon::now(),
    ];
});
