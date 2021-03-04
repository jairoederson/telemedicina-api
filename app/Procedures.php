<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedures extends Model
{
    protected $table = "procedures";

    protected $fillable = [
      'procedure',
      'interconsultation',
      'transfer',
      'medical_rest_start',
      'medical_rest_end',
      'next_date',
      'query_offline_id',
      'query_id',
    ];
}
