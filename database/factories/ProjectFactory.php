<?php

use Faker\Generator;
use Illuminate\Support\Carbon;
use Webpatser\Uuid\Uuid;
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
        'name' => $faker->words(3, true),
        'public_name' => $faker->words(3, true),
        'start_date' => Carbon::yesterday(),
        'end_date' => Carbon::tomorrow(),
        'listing_start_date' => Carbon::yesterday(),
        'listing_end_date' => Carbon::now(),
        'application_deadline' => Carbon::now(),
        'application_deadline_text' => 'Ongoing',
        'opportunity_status_id' => $faker->numberBetween(1, 7),
        'is_hidden' => false,
        'description' => $faker->words(4, true),
        'summary' => $faker->words(4, true),
        'follower_count' => $faker->numberBetween(0, 10),
        'parent_opportunity_id' => null,
        'organization_id' => 1,
        'supervisor_user_id' => 1,
        'submitting_user_id' => 1,
        'opportunityable' => [
            'review_status_id' => '1',
            'degree_program' => 'School of Sustainability',
            'compensation' => 'Lorem compensation',
            'responsiblities' => 'Lorem responsiblities',
            'learning_outcomes' => 'Lorem learning outcomes',
            'sustainability_outcomes' => 'Lorem sustainability outcomes',
            'qualifications' => 'Lorem qualifications',
            'application_instructions' => 'Lorem application instructions',
            'implementation_paths' => 'Lorem implementation',
            'budget_type_id' => '3',
            'budget_amount' => 'Lorem budget notes',
            'program_lead' => 'Lorem program lead',
            'success_story' => 'https://example.test',
            'library_collection' => 'https://example.test',
        ]
    ];
});


$factory->state(Project::class, 'hidden', function () {
    return [
        'hidden' => true,
    ];
});

$factory->state(Project::class, 'active', function () {
    return [
        'active' => 1,
    ];
});

$factory->state(Project::class, 'closed', function () {
    return [
        'active' => 0,
    ];
});

$factory->state(Project::class, 'softDeleted', function () {
    return [
        'deleted_at' => Carbon::now(),
    ];
});
