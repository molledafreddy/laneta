<?php

use Illuminate\Database\Seeder;
use LaNeta\Award;

class AwardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Award::class, 25)->create();
    }
}
