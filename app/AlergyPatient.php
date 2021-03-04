<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlergyPatient extends Model
{
  protected $table = "alergy_patients";

  protected $fillable = [
    "patient_id",
    "active_medication_id"
  ];
}
