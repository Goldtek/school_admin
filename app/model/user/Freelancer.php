<?php
namespace  App\model\user;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
  protected  $table="freelancer";
    
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
