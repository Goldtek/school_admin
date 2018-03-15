<?php

namespace App\model\user;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
      protected $fillable = [
        'qualification', 'start', 'end','user_id','grade','institute'
    ];
    
}
