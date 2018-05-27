<?php

use Faker\Generator as Faker;

$factory->define(LaNeta\UserChat::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 20),
        'chat_id' => $faker->numberBetween($min = 1, $max = 20)
    ];
});
