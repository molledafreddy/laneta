<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;
use LaNeta\Like;
use LaNeta\User;
use Auth;

class Comment extends Model
{

	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'post_id', 'user_id', 'content',
    ];

    /**
     * Get the comment record associated.
     */
    public function user()
    {
        return $this -> belongsTo(User::class);
    }

    /**
     * Get the comment record associated.
     */
    public function likes()
    {
        return $this -> hasMany(Like::class);
    }

    /**
     * Get the comment record associated.
     */
    public function count_likes()
    {
        return Like::where("comment_id", $this->id)
            ->count();
    }

}
