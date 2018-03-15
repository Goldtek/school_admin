<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assigned extends Model
{

    protected $table = "assigned_courses";
    public $timestamps=false;
    
    protected $fillable = [
        'class_id', 
        'course_id', 
        'user_id', 
    ];
    
   
}
