<?php

use Faker\Generator;
use Ramsey\Uuid\Uuid;
use App\Models\Auth\User;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Generator $faker) {
    return [
        'uuid' => Uuid::uuid4()->toString(),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => 'secret',
        'password_changed_at' => null,
        'remember_token' => Str::random(10),
        'confirmation_code' => md5(uniqid(mt_rand(), true)),
        'active' => true,
        'confirmed' => true,
        'user_type_id' => 1,
    ];
});

$factory->state(User::class, 'active', function () {
    return [
        'active' => true,
    ];
});

$factory->state(User::class, 'inactive', function () {
    return [
        'active' => false,
    ];
});

$factory->state(User::class, 'confirmed', function () {
    return [
        'confirmed' => true,
    ];
});

$factory->state(User::class, 'unconfirmed', function () {
    return [
        'confirmed' => false,
    ];
});

$factory->state(User::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});

$factory->state(User::class, 'student', function () {
    return [
        'user_type_id' => 1,
    ];
});

$factory->state(User::class, 'alumni', function () {
    return [
        'user_type_id' => 2,
    ];
});

$factory->state(User::class, 'faculty', function () {
    return [
        'user_type_id' => 3,
    ];
});

$factory->state(User::class, 'staff', function () {
    return [
        'user_type_id' => 4,
    ];
});

$factory->state(User::class, 'professional', function () {
    return [
        'user_type_id' => 5,
    ];
});
