<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Physical_exams extends Model
{
    protected $table = "physical_exams";

    protected $fillable = [
      'consciousness_state',
      'physical_examination',
      'query_id',
      'query_offline_id',
      'general_status_id',
    ];
}
