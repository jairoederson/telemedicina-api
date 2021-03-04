<?php
namespace App\Mifarma\Entities;
class Symptom extends \Eloquent {
	protected $table = 'symptom';

    protected $fillable =
		[	'name',
     	'description',
		 	'estado',
		 	'usuario_created_id',
			'usuario_upd_id',
			'terminal',
			'terminal_upd',
			'deleted_at'
    ];
}
