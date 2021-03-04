<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeConceptTransaction extends Model
{
  protected $table = "type_concept_transactions";

  protected $fillable = [
    "name",
    "description",
    "state",
  ];
}
