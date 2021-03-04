<?php

namespace App\Mifarma\Entities;

class Doctor extends \Eloquent
{
	protected $table='doctors';
	
		protected $fillable=['specialty_id',
			'id_cmp',
			'qualification',
			'linkedIn',
			'about_me',
			'users_id'			
		];
}