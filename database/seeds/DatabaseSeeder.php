<?php

use Illuminate\Database\Seeder;
use LaNeta\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::flushEventListeners();
        $this->call(UserTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CounstriesTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(PostMediaTableSeeder::class);
        $this->call(ChatTableSeeder::class);
        $this->call(MessageTableSeeder::class);
        $this->call(UserChatTableSeeder::class);
        $this->call(NotificationTableSeeder::class);
        $this->call(AwardTypesTableSeeder::class);
        $this->call(AwardsTableSeeder::class);
        $this->call(LaNetaSeeder::class);
    }
}
