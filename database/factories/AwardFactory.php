<?php

use Faker\Generator as Faker;

$factory->define(LaNeta\Award::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
		'description' => $faker->text(80),
		'hits' => mt_rand(1,99999),
		'award_type_id' => mt_rand(1, 4),
    ];
});


