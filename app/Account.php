<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	protected $table = 'accounts';
	protected $fillable = [ 'code', 'user_id', 'hits', ];
	
}
