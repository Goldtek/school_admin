<?php

namespace App\model\user;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'companyname', 'start_date', 'end_date','user_id','experience'
    ];

}
