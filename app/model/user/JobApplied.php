<?php

namespace App\model\user;

use Illuminate\Database\Eloquent\Model;

class JobApplied extends Model
{
   protected $table='jobs_applied';
    
      protected $fillable = [
    'user_id',
          'job_id',
          'cv',
          'fname',
          'sname',
          'email',
          'phone',
          'location',
          'jobTitle',
          'specialization',
          'companyName',
          'startYear',
          'startMonth',
          'endMonth',
          'endYear',
          'experience',
          'hedu',
          'company_id',
          ];
}
