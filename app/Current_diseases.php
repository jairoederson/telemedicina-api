<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Current_diseases extends Model
{
    protected $table = "current_diseases";

    protected $fillable = [
      'reason_consultation',
      'sign_sympthoms',
      'start_form',
      'sickness_time',
      'type_informant',
      'chronological_story',
      'type_informant_id',
      'appetite_id',
      'dream_id',
      'deposition_id',
      'thirst_id',
      'urine_id',
      'query_id',
      'query_offline_id'
    ];

}
