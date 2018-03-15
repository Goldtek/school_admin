<?php

namespace App\model\user;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
     protected $fillable = [
        'name', 'percent','user_id', 
    ];
}
