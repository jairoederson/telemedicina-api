<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $fillable =
        ['name',
        'description',
        'estado',
        'usuario_created_id',
        'usuario_upd_id',
        'terminal',
        'terminal_upd',
    ];
}
