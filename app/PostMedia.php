<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;

class PostMedia extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts_media';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'media', 'type', 'status'
    ];
}
