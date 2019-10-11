<?php

use Faker\Generator;
use SCCatalog\Models\Reference\OpportunityStatus;

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
        'opportunity_type_id' => 2,
        'name' => 'Idea Submission',
    ];
});

$factory->state(OpportunityStatus::class, 'project', function () {
    return [
        'opportunity_type_id' => 2,
        'name' => 'Idea Submission',
    ];
});

$factory->state(OpportunityStatus::class, 'internship', function () {
    return [
        'opportunity_type_id' => 3,
        'name' => 'Active',
    ];
});

$factory->state(OpportunityStatus::class, 'softDeleted', function () {
    return [
        'deleted_at' => \Illuminate\Support\Carbon::now(),
    ];
});
