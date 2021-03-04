<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordPathologicalPatient extends Model
{
  protected $table = "record_pathological_patients";

  protected $fillable = [
    "CIE",
    "description",
    "patient_id",
  ];
}
