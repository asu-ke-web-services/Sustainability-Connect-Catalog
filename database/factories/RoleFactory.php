<?php

use SCCatalog\Models\Auth\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
