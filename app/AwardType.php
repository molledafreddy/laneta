<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;
use LaNeta\Award;

class AwardType extends Model
{
    protected $fillable = [ 'name', 'image'];

    public function awards(){
    	return $this -> hasMany(Award::class);
    }
}
