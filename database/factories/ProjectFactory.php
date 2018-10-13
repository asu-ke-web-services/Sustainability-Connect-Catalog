<?php

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
        'review_status_id' => '1'
    ];
});
