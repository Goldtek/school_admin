<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class_Course extends Model
{
    public $timestamps=false;
    protected $table = 'class_courses';
    
    protected $fillable = [
        'class_id', 
        'course_id', 
    ];
    
   
}
