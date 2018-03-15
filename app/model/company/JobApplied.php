<?php


namespace App\model\company;

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
          'experience',
          'hedu',
          'company_id',
          ];
}
