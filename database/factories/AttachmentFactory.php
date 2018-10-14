<?php

use Faker\Generator;
use SCCatalog\Models\Attachment\Attachment;

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

$factory->define(Attachment::class, function (Generator $faker) {
    return [
        'status'  => 'Tempe',
    ];
});

$factory->state(Attachment::class, 'softDeleted', function () {
    return [
        'deleted_at' => \Illuminate\Support\Carbon::now(),
    ];
});
