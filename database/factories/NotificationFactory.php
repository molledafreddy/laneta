<?php

use Faker\Generator as Faker;

$factory->define(LaNeta\Notification::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'description'=>$faker->realText(150),
        'user_id' => $faker->numberBetween($min = 1, $max = 23),
        'status' =>'new',
    ];
});
