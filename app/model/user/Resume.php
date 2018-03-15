<?php

namespace App\model\user;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
     protected $fillable = [
        'title', 'resume', 'user_id', 
    ];
}
