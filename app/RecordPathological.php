<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordPathological extends Model
{
  protected $table = "record_pathologicals";

  protected $fillable = [
    "CIE",
    "description",
  ];
}
