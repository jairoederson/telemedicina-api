<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biological_functions extends Model
{
    protected $table = "biological_functions";

    protected $fillable = [
      'appetite',
      'thirst',
      'dream',
      'urine',
      'depositions',
      'query_id',
    ];
}
