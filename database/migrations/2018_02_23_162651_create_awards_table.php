<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('awards', function (Blueprint $table) {
			$table->increments('id');
			
			$table->string('name');
			$table->string('description', 150);
			$table->integer('hits')->unsigned();
			$table->integer('award_type_id')->unsigned();
			
			$table->timestamps();
			
			$table->foreign('award_type_id')->references('id')->on('award_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('awards');
	}
}
