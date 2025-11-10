<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'user_roles';
    
    public function users()
    {
        return $this->hasMany('User', 'user_role', 'role_id');
    }
    
}
