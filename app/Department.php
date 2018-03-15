<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    
    public $timestamps=false;
    
    protected $fillable = [
        'name', 
        'active', 
        'created', 
    ];
    
   
}
