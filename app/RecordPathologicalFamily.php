<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordPathologicalFamily extends Model
{
  protected $table = "record_pathological_families";

  protected $fillable = [
    "CIE",
    "description",
    "familiar",
  ];
}
