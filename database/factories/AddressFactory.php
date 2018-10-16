<?php

use Faker\Generator;
use SCCatalog\Models\Address\Address;

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

$factory->define(Address::class, function (Generator $faker) {
    return [
        'city'  => 'Tempe',
        'state' => 'AZ',
    ];
});

$factory->state(Address::class, 'softDeleted', function () {
    return [
        'deleted_at' => \Illuminate\Support\Carbon::now(),
    ];
});