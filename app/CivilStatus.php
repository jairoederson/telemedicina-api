<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CivilStatus extends Model
{
    protected $table = 'civil_status';
    protected $fillable = [
        "name",
        "description",
        "state"
      ];
}
