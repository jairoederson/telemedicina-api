<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GinecologicalRecordPatient extends Model
{
  protected $table = "ginecological_record_patients";

  protected $fillable = [
    "menarquia",
    "regular_rule",
    "r_caternial",
    "rs",
    "fur",
    "fpp",
    "disminorrea",
    "nro_gestaciones",
    "fup",
    "pariedad",
    "cesareas",
    "pap",
    "mamografia",
    "mac",
    "otros",
    "patient_id",
  ];
}
