<?php

use Illuminate\Database\Seeder;
use LaNeta\AwardType;

class AwardTypesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		AwardType::insert(
			[
				[
					'name' => 'Hits',
					'image' => 'star.svg',
				],
				[
					'name' => 'Noticias',
					'image' => 'trophy.svg',
				],
				[
					'name' => 'Comentarios',
					'image' => 'medal.svg',
				],
				[
					'name' => 'Likes',
					'image' => 'shield.svg',
				],
			]
		);
	}
}
