<?php

use Faker\Generator as Faker;

$factory->define(\SCCatalog\Models\Auth\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
