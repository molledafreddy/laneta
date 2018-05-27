<?php

use Faker\Generator as Faker;

$factory->define(LaNeta\Event::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'description'=>$faker->realText(150),
        'hits'=>$faker->numberBetween(1,1000),
    ];
});
