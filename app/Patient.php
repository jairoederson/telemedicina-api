<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  protected $table = "patients";

  // fillable
  protected $fillable = [
    "ocupation",
    "num_attentions",
    "users_id",
    "degree_instruction_id",
    "civil_status_id",
    "work_center",
    "card_id",
    "card_to_use",
    "temp_symptom",
    "temp_message",
    "weight",
    "size",
    "allergies",
    "temp_imageSymptom",
    "temp_analysis",
    "temp_key_symptoms",
    "temp_imageSymptomBase64",
    "temp_analysis_base64",
    "call_state",
    "bloodType"
  ];
}
