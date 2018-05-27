<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('media')->default('default.png');

            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onCascade();

            $table->enum('type', ['P', 'U'])->default('P');            
            $table->enum('status', ['A', 'I'])->default('A');

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
        Schema::dropIfExists('posts_media');
    }
}
