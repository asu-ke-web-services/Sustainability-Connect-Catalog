<?php

use Faker\Generator;
use SCCatalog\Models\Lookup\UserType;

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

$factory->define(UserType::class, function (Generator $faker) {
    return [
        'order'               => 1,
        'name'                => 'student',
    ];
});

$factory->state(UserType::class, 'softDeleted', function () {
    return [
        'deleted_at' => \Illuminate\Support\Carbon::now(),
    ];
});
