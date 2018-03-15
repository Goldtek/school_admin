<?php

namespace App\model\user;

use Illuminate\Database\Eloquent\Model;

class FreelanceApplied extends Model
{
   protected $table='freelance_applied';
    
      protected $fillable = [
    'user_id',
          'job_id',
          'cv',
          'fname',
          'sname',
          'email',
          'phone',
          'location',
          'experience',
          'hedu',
          'company_id',
          ];
}
