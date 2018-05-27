<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;
use LaNeta\AwardType;

class Award extends Model
{
    protected $fillable = [ 'name', 'description', 'hits', 'award_type_id' ];

    public function award_type(){
    	return $this -> belongsTo(AwardType::class);
    }
}
