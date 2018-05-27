<?php

use Illuminate\Database\Seeder;
use LaNeta\UserChat;

class UserChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LaNeta\UserChat::class, 25)->create();
    }
}
