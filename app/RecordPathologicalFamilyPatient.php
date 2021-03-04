<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordPathologicalFamilyPatient extends Model
{
  protected $table = "record_pathological_family_patients";

  protected $fillable = [
    "CIE",
    "description",
    "familiar",
    "patient_id",
  ];
}
