<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    
    public $timestamps=false;
    
    protected $fillable = [
        'class_id', 
        'course_id', 
        'user_id', 
        'path', 
    ];
    
   
}
