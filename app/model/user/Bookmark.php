<?php

namespace App\model\user;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
     protected $table ="bookmark";
    public $timestamps=false;
     protected $fillable = [
     'company_id','user_id', 
    ];
}
