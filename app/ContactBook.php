<?php

namespace LaNeta;
use LaNeta\Contact;

use Illuminate\Database\Eloquent\Model;

class ContactBook extends Model
{
    protected $fillable = [ 'user_id'];
    
    public function contacts(){
    	return $this -> hasMany(Contact::class);
    }
}
