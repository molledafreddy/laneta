<?php

use Faker\Generator as Faker;

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

$factory->define(LaNeta\Admin::class, function (Faker $faker) {
    return [
        'first_name' => $faker -> name,
        'last_name' => $faker -> name,
        'username' => $faker -> userName,
        'job_title' => $faker -> jobTitle,
        'gender' => $faker -> randomElement([1,0]), 
        'phone' => $faker -> e164PhoneNumber, 
        'status' => $faker -> randomElement([1,0]), 
        'email' => $faker -> safeEmail,
        'password' => bcrypt('admin1234'), // secret
        'image' => $faker -> imageUrl(640, 480),
        'remember_token' => str_random(10),
    ];
});
