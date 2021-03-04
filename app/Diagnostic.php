<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    protected $table = "diagnostics";

    protected $fillable = [
      'code',
      'description',
      'type_diagnostic_id',
      'query_id',
      'query_offline_id'
    ];
}
