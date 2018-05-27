<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	
	protected $fillable = [ 'iso_code', 'tel_code', 'name' ];
	
}
