<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;
use LaNeta\User;

class Message extends Model
{
    protected $fillable = [
        'subject', 'content', 'chat_id', 'user_id'
    ];    

    public function user ()
    {
        return $this->BelongsTo(User::class);
    }
}
