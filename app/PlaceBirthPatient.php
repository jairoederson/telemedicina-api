<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceBirthPatient extends Model
{
    protected $table = 'place_birth_patients';
    protected $fillable = ['ubigeo_id','patient_id'];
}
