<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $table = "work_experiences";
   
    protected $fillable = [
       "institution","activity","start_date","end_date","doctors_id","estado"
     ];
}
