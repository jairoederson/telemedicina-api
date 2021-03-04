<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralRecordPatient extends Model
{
  protected $table = "general_record_patients";

  protected $fillable = [
    "medicaments",
    "RAM",
    "occupational",
    "general_prenatal_id",
    "general_birth_id",
    "general_immunization_id",
    "harmful_habits_id",
    "patient_id",
  ];
}
