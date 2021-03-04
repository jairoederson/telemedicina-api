<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialityDoctor extends Model
{
    protected $table = 'doctor_specialities';

  protected $fillable = [
      'id',
    'doctor_id',
    'speciality_id'
];
}
