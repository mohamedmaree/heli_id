<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Factory as Faker;

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

$factory->define(\App\Models\User::class, function () {
    $faker                   = Faker::create('ar_SA');
    return [

        'name'               => $faker->name,
        'email'              => $faker->unique()->safeEmail,
        'phone'              => $faker->unique()->phoneNumber,
        'email_verified_at'  => now(),
        'password'           => 123456,
        'block'              => rand(0,1),
        'active'             => rand(0,1),
    ];
});
