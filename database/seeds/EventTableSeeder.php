<?php

use Illuminate\Database\Seeder;
use LaNeta\Event;

class EventTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('events')->insert([
			[
				'name'=>'Comentario creado',
				'description'=>'Suma 5 hits al usuario que escribió la nota',
				'hits'=>5
			],
			[
				'name'=>'Compartir en redes',
				'description'=>'Suma 5 hits al usuario que escribió la nota',
				'hits'=>5
			],
			[
				'name'=>'Compartir link',
				'description'=>'Suma 4 hits al usuario que escribió la nota',
				'hits'=>4
			],
			[
				'name'=>'Compartir por email',
				'description'=>'Suma 3 hits al usuario que escribió la nota compartida',
				'hits'=>3
			],
			[
				'name'=>'Crear un post',
				'description'=>'Suma 2 hits a un editor por cada nota creada',
				'hits'=>2
			],
			[
				'name'=>'Seguir a un amigo',
				'description'=>'Suma un hit al editor que se está siguiendo',
				'hits'=>1
			],
			[
				'name'=>'Dar like a un post',
				'description'=>'Suma 2 hits al editor del post',
				'hits'=>2
			]
		]);
	}
}
