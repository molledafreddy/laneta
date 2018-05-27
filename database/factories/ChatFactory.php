<?php

use Faker\Generator as Faker;

$factory->define(LaNeta\Chat::class, function (Faker $faker) {
    return [
        'topic' => $faker -> name,
    ];
});
