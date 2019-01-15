<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function member()
    {
    	return $this->belongsToMany(Member::class);    
    }
}
