<?php

namespace App\model\user;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'email', 'sname', 'password', 'dob', 'phone', 'institute', 'address','salary','joblevel', 'hedu','city','country','about','image','job','cv','google','facebook','linkin','twitter','industry','experience'
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
    
    public function Fullname(){
           return ucfirst($this->sname)." ".ucfirst($this->fname);
    }
    
    public function occupatn(){
        return strtoupper($this->qualification);
    }
    
   
    
    
}
