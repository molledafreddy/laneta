<?php

use Faker\Generator as Faker;
use LaNeta\User;

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

$factory->define(LaNeta\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker -> name,
        'last_name' => $faker -> name,
        'username' => $faker -> userName,
        'gender' => $faker -> randomElement([1,0]), 
        'phone' => $faker -> e164PhoneNumber, 
        'location' => $faker -> country, 
        'status' => $faker -> randomElement([1,0]), 
        'email' => $faker->unique()->safeEmail,
        'hits' => mt_rand(1,99999),
        'biography' => $faker -> realText(150),
        'password' => bcrypt('admin1234'), // secret
        'image' => $faker -> imageUrl(640, 480),
        'remember_token' => str_random(10),
        'verified' => $verificado = $faker->randomElement([User::USUARIO_VERIFICADO, User::USUARIO_NO_VERIFICADO]),
        'verification_token' => $verificado == User::USUARIO_VERIFICADO ? null : User::generarVerificationToken()
       
    ];
});