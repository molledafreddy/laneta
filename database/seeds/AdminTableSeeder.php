<?php

use Illuminate\Database\Seeder;
use LaNeta\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'first_name' => 'System',
            'last_name' => 'Administrator',
            'username' => 'admin',
            'gender' => 1, 
            'phone' => 1234567, 
            'status' => 1,
            'job_title' => 'Administrador de Sistemas',
            'email' => 'admin@laneta.com',
            'password' => bcrypt('admin1234'), // secret
            'image' => 'https://lorempixel.com/640/480/?3',
            'remember_token' => str_random(10),
        ]);
        factory(LaNeta\Admin::class, 25)->create();
    }
}
