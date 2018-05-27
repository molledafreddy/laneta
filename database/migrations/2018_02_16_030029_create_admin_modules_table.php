<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->unsignedInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_modules');
    }
}
