<?php

use Illuminate\Database\Seeder;
use LaNeta\Chat;

class ChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LaNeta\Chat::class, 25)->create();
    }
}
