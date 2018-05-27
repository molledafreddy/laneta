<?php

use Illuminate\Database\Seeder;
use LaNeta\Post;

class PostMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Post::all();
        foreach ($post as $data){

            DB::table('posts_media')->insert([
                'post_id' => $data->id,
                'media' => 'default.png',
                'type' => 'P',
                'status' => 'A',
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
            ]);
        }
    }
}
