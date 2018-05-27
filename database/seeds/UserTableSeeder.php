<?php

use Illuminate\Database\Seeder;
use LaNeta\User;

class UserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create([
			'first_name' => 'Usuario',
			'last_name' => 'Temporal',
			'username' => 'usertemp',
			'email' => 'usertemp@laneta.com',
			'gender' => 1,
			'phone' => 1234567,
			'location' => 'Mexico',
			'status' => 1,
			'password' => bcrypt('admin1234'),
			'image' => '/uploads/default_user.png',
			'hits' => mt_rand(1,99999),
			'biography' => 'Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. ',
			'remember_token' => str_random(10),
			'verified' => User::USUARIO_VERIFICADO,
			'verification_token' => User::generarVerificationToken()
		]);
				
		factory(LaNeta\User::class, 25)->create();
	}
}
