<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeUm extends Model
{
  protected $table = "type_ums";

  protected $fillable = [
    "name",
    "description",
    "state",
  ];
}
