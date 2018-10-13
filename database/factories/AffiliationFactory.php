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
        'opportunity_type_id' => 1,
        'order'               => 1,
        'name'                => 'undergraduate',
        'access_control'      => 0,
    ];
});

$factory->state(Affiliation::class, 'project', function () {
    return [
        'opportunity_type_id' => 1,
    ];
});

$factory->state(Affiliation::class, 'internship', function () {
    return [
        'opportunity_type_id' => 2,
    ];
});

$factory->state(Affiliation::class, 'access_restricted', function () {
    return [
        'access_control' => 1,
    ];
});

$factory->state(Affiliation::class, 'softDeleted', function () {
    return [
        'deleted_at' => \Illuminate\Support\Carbon::now(),
    ];
});
