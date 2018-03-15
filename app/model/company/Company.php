<?php

namespace App\model\company;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
  protected $guard = 'admin';
    
    protected $fillable = [
        'fname',
        'sname',
        'name',
        'website',
         'email',
        'phone',
        'password',
        'industry',
        'noEmployee',
        'address',
        'city',
        'country',
        'about',
        'image',
        'logo',
        'lga',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
      public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
