<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use LaNeta\User;
class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			
			// Columnas iniciales
			$table->string('first_name');
			$table->string('second_name')->nullable();
			$table->string('last_name');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->boolean('status')->default(1);
			$table->boolean('verified')->nullable()->default(0);
			$table->string('verification_token')->nullable()->default(0);

			// Columnas para ganar hits
			$table->boolean('gender')->nullable()->defaut(0);
			$table->string('phone')->default(0);
			$table->unsignedInteger('country_id')->nullable();
			$table->string('city')->nullable();
			$table->text('biography')->nullable();
			$table->string('image')->nullable();
			$table->string('location')->nullable();
			$table->unsignedInteger('hits')->default(0);
			
			// Columnas de segundo nivel
			$table->string('job')->nullable();          
			$table->string('title')->nullable();		
			$table->string('school')->nullable();       
			$table->string('hobbie')->nullable();       
			$table->string('website')->nullable();      
			$table->string('facebook')->nullable();     
			$table->string('instagram')->nullable();    
			$table->string('twitter')->nullable();      
			
			$table->rememberToken();
			$table->timestamps();

			
            $table->foreign('country_id')->references('id')->on('countries');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
