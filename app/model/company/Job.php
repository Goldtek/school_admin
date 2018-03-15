<?php

namespace App\model\company;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
    'category',
    'jobExperience',
    'location',
    'jobType',
     'salary',
     'tags',
    'jobDetails',
    'company_id',
    'enddate',
    'noVacany',
   'title',
   'joblevel',
   'responsibility',
   'requirement',
        ];
}
