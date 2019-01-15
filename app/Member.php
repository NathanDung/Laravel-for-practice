<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function role()
    {
    	return $this->belongsToMany(Role::class);    
    }
}
