<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
      protected $table = "symptom";

    protected $fillable =
        ['name',
        'description',
        'estado',
        'usuario_created_id',
        'usuario_upd_id',
        'terminal',
        'terminal_upd',
        'diseas_id',
    ];
}
