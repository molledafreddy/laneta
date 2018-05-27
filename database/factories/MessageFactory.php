<?php

use Faker\Generator as Faker;
use LaNeta\Message;
use LaNeta\User;
use LaNeta\Chat;

$factory->define(Message::class, function (Faker $faker) {
    $u = User::inRandomOrder()->first();
    $c = Chat::inRandomOrder()->first();
    $title = $faker->realText(15);
    return [
        'subject' => $faker->realText(30),
        'content' => $faker->realText(200),
        'user_id' => $u->id,
        'chat_id' => $c->id,
    ];
});
