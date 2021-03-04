<?php

namespace App\Mifarma\Entities;

class UserPhone extends \Eloquent
{
    protected $table = 'user_phones';

    protected $fillable = ['code',
        'number',
        'description',
        'type_phones_id',
        'users_id',
        'estado',
        'usuario_created_id',
        'usuario_upd_id',
        'terminal',
        'terminal_upd',
    ];
}
