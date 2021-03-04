<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalDataPatient extends Model
{
    protected $table = 'medical_data_patients';
    protected $fillable = ['factor_rh','blood_type_id','medical_history_id'];
}
