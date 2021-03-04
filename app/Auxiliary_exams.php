<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auxiliary_exams extends Model
{
    protected $table = "auxiliary_exams";

    protected $fillable = [
      'laboratory',
      'imaging',
      'query_id',
    ];
}
