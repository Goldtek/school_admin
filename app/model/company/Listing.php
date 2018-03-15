<?php


namespace App\model\company;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
   protected $table='listing';
    public $timestamps=false;
      protected $fillable = [
            'user_id',
          'job_id',
          'company_id',
          ];
}
