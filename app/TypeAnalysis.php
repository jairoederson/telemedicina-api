<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeAnalysis extends Model
{
  protected $table = "type_analysis";

  protected $fillable = [
    "name",
  ];
}
