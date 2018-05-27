<?php

namespace LaNeta;
use LaNeta\User;

use Illuminate\Database\Eloquent\Model;

class UserChat extends Model
{
   protected $fillable = [ 'user_id','chat_id' ];

   public function user ()
    {
        return $this->BelongsTo(User::class);
    }
}
