<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calification extends Model
{
    // table
    protected $table = "califications";

    // campos
    protected $fillable = [
      "doctor_id",
      "patient_id",
      "query_id",
      "calification"
    ];
}
