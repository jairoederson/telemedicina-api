<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademincTraining extends Model
{
    protected $table = "academinc_trainings";
   
    protected $fillable = [
      "institution","title","start_date","end_date", "doctors_id","estado"
     ];

}
