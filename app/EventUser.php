<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
	protected $table = 'events_users';
	protected $fillable = [ 'user_id', 'event_id' ];
	
}
