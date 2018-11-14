<?php

use Carbon\Carbon;
use Faker\Generator;
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

$factory->define(Project::class, function (Generator $faker) {
    return [
		'name'                    => $faker->words(3, true),
		'opportunity_status_id'   => $faker->numberBetween(3, 6),
		'review_status_id'        => 3,
        'application_deadline_at' => Carbon::now()->addDays(7),
    ];
});

// $factory->state(Project::class, 'hidden', function () {
//     return [
//         'hidden' => true,
//     ];
// });

$factory->state(Project::class, 'completed', function () {
    return [
        'opportunity_status_id' => 7,
    ];
});

$factory->state(Project::class, 'softDeleted', function () {
    return [
        'deleted_at' => Carbon::now(),
    ];
});
