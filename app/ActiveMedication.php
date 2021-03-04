<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiveMedication extends Model
{
  protected $table = "active_medications";

  protected $fillable = [
    "name",
    "description"
  ];
}
