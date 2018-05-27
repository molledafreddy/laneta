<?php

namespace LaNeta;

use Illuminate\Database\Eloquent\Model;
use LaNeta\User;
use LaNeta\Models\Module;

class AdminModule extends Model
{
    protected $fillable = [
        'admin_id', 'module_id'
    ];


    public function admin ()
    {
        return $this->BelongsTo(User::class);
    }

    public function module ()
    {
        return $this->BelongsTo(Module::class);
    }
}
