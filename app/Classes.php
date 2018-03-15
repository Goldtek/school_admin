<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{

    
    public $timestamps=false;
    protected $table = 'classes';
    protected $fillable = [
        'department_id', 
        'level_id', 
    ];
    
   
}
