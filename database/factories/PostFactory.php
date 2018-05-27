<?php

use Faker\Generator as Faker;
use LaNeta\Post;
use LaNeta\User;

$factory->define(Post::class, function (Faker $faker) {
    $user  = User::inRandomOrder()->first();
    $title = $faker->realText(15);
    return [
        'title' => $faker->realText(100),
        'description' => $faker->realText(500),
        'location' => $faker->country,
        'user_id' => $user->id,
        'slug' => str_replace([' ','!','.',',','*','/','?','"', '\''], '-' , $title),
        'status' => $faker->randomElement(['A', 'I']),
        'created_at'=>date('Y-m-d H:i:s'),
		'updated_at'=>date('Y-m-d H:i:s'),
    ];
});
