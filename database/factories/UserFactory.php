<?php

use Faker\Generator as Faker;
use Webpatser\Uuid\Uuid;
use SCCatalog\Models\Auth\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(SCCatalog\Models\User::class, function (Faker $faker) {
    return [
        'uuid'              => Uuid::generate(4)->string,
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'email'             => $faker->safeEmail,
        'password'          => 'secret',
        'password_changed_at' => null,
        'remember_token'    => str_random(10),
        'confirmation_code' => md5(uniqid(mt_rand(), true)),
        'active' => 1,
        'confirmed' => 1,
    ];
});

$factory->state(User::class, 'active', function () {
    return [
        'active' => 1,
    ];
});

$factory->state(User::class, 'inactive', function () {
    return [
        'active' => 0,
    ];
});

$factory->state(User::class, 'confirmed', function () {
    return [
        'confirmed' => 1,
    ];
});

$factory->state(User::class, 'unconfirmed', function () {
    return [
        'confirmed' => 0,
    ];
});

$factory->state(User::class, 'softDeleted', function () {
    return [
        'deleted_at' => \Illuminate\Support\Carbon::now(),
    ];
});
