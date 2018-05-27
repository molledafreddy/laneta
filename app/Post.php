<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;
use LaNeta\User;
use LaNeta\Comment;
use LaNeta\PostMedia;
use LaNeta\LikeComment;

class Post extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'location', 'status', 'slug', 'user_id', 'views'
    ];

    /**
     * Get the user record associated.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comment record associated.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the comment record associated.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Get the comment record associated.
     */
    public function views()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the comment record associated.
     */
    public function media()
    {
        return $this->hasMany(PostMedia::class);
    }
}
