<?php

namespace App\Mifarma\Entities;

class TypePhone extends \Eloquent
{
    protected $table = 'type_phones';

    protected $fillable = ['name',
        'description',
        'estado',
        'usuario_created_id',
        'usuario_upd_id',
        'terminal',
        'terminal_upd',
    ];
}
