<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'name', 'description'
    ];
}
