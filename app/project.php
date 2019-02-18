<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    // protected $fillable = [
    // 	'title', 'description'
    // ];

    protected $guarded = [];

    public function tasks()
    {
    	return $this->belongsToMany(Task::class);    
    }
}
