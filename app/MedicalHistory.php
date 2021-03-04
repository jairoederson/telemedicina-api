<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
  protected $table = "medical_histories";

  protected $fillable = [
    "patient_id",
    "nro_medical_history",
  ];
}
