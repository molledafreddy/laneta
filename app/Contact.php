<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;
use LaNeta\User;

class Contact extends Model
{
    protected $fillable = [ 'user_id', 'contact_book_id' ];

    public function user(){
    	return $this -> belongsTo(User::class);
    }

}

