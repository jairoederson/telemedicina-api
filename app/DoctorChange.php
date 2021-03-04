<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorChange extends Model
{
    protected $fillable = [
      'user_id','doctor_id','patient_id','fields','status','query_offline_id'
    ];
}
