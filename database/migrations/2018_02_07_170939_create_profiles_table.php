<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			
			$table->string('firstname'); 	// Nivel 1 Nombre String
			$table->string('father_name'); 	// Nivel 1 Apellido paterno String
			$table->string('mother_name'); 	// Nivel 1 Apellido materno String
			$table->string('photo_path'); 	// Nivel 1 Foto String
			$table->string('nick_name'); 	// Nivel 1 Apodo String
			$table->string('phone'); 		// Nivel 1 Telefono String
			$table->string('city'); 		// Nivel 1 Cidudad String
			
			$table->text('biography')->nullable(); 		// Nivel 2 Biografía String
			$table->string('job')->nullable(); 			// Nivel 2 Trabajo String
			$table->string('school')->nullable(); 		// Nivel 2 Escuela String
			$table->string('hobbie')->nullable(); 		// Nivel 2 Hobbie String
			$table->string('website')->nullable(); 		// Nivel 2 Sitio web String
			
			$table->string('facebook')->nullable(); 	// Nivel 3 Usuario facebook String
			$table->string('instagram')->nullable(); 	// Nivel 3 Usuario instagram String
			$table->string('twitter')->nullable(); 		// Nivel 3 Usuario twitter String
			
			$table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('profiles');
	}
}
