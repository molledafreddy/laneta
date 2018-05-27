<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;
use LaNeta\User;

class Notification extends Model
{
    protected $fillable = [
        'name', 'description','user_id','status'
    ];

    public function User()
    {
        return $this->BelongsTo(User::class);
    }
}

