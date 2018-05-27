<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;
use LaNeta\Models\Message;
use LaNeta\Models\UserChat;

class Chat extends Model
{
    protected $fillable = [ 'topic' ];

    public function user_chats ()
    {
        return $this->hasmany(UserChat::class);
    }

    public function messages ()
    {
        return $this->hasmany(Message::class);
    }
}
