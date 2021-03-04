<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vital_functions extends Model
{
    protected $table = "vital_functions";

    protected $fillable = [
      "minimal_blood_pressure",
      "maximum_blood_pressure",
      "Breathing_frequency",
      "heart_rate",
      "temperature",
      "weight",
      "size",
      'query_id',
    ];
}
