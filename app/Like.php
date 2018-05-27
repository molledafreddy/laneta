<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;
use LaNeta\Comment;

class Like extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'likes';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'comment_id', 'post_id', 'user_id'
    ];

    public function comment(){
        return $this -> belongsTo(Comment::class);
    }


    public function post(){
        return $this -> belongsTo(Post::class);
    }
}
