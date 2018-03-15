<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{

    
    public $timestamps=false;
    
    protected $fillable = [
        'course_id', 
        'class_id', 
        'path', 
        'created_at',
        'filename',
        'submissionDate'

    ];
    
   
}
