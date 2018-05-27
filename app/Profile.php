<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = 'profiles';
	protected $fillable = [
		'user_id',
		'firstname',
		'father_name',
		'mother_name',
		'photo_path',
		'nick_name',
		'phone',
		'city',
		'biography',
		'job',
		'school',
		'hobbie',
		'website',
		'facebook',
		'instagram',
		'twitter' 
	];
	
}
