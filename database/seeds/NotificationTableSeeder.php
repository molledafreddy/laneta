<?php

use Illuminate\Database\Seeder;
use LaNeta\Notification;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Notification::class, 20)->create();
    }
}
