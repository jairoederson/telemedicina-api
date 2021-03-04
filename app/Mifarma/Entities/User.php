<?php

namespace App\Mifarma\Entities;

class User extends \Eloquent
{
	protected $table='users';

		protected $fillable=['email',
			'password',
			'fingerprint',
			'permissions',
			'last_login',
			'name',
			'last_name',
			//'ape_paterno',
			//'ape_materno',
			'gender',
			'state',
			'address',
			'postal',
			'ubigeo_id',
			'user_sinch',
			'password_sinch',
			'country',
			'numdoc',
			'type_document_id',
			'img',
			'tel',
			'birth_date',
			'estado',
			'usuario_created_id',
			'usuario_upd_id',
			'terminal',
			'terminal_upd',
			'deleted_at'
		];
}
