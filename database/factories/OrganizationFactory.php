<?php

use Faker\Generator;
use SCCatalog\Models\Organization\Organization;

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

$factory->define(Organization::class, function (Generator $faker) {
    return [
		'name'                   => 'Acme Corp',
		'organization_type_id'   => 2,
		'organization_status_id' => 1,
    ];
});

$factory->state(Affiliation::class, 'inactive', function () {
    return [
        'organization_status_id' => 1,
    ];
});

$factory->state(Affiliation::class, 'active', function () {
    return [
        'organization_status_id' => 2,
    ];
});

$factory->state(Organization::class, 'softDeleted', function () {
    return [
        'deleted_at' => \Illuminate\Support\Carbon::now(),
    ];
});
