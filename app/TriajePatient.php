<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TriajePatient extends Model
{
  protected $table = "triaje_patients";

  protected $fillable = [
    'blood_pressure',
    'breathing_frequency',
    'heart_rate',
    'temperature',
    'weight',
    'size',
    'query_offline_id',
    'query_id',
    'patient_id',
  ];
}
