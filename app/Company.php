<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = "companies";
      protected $fillable = [
				'name',
				'ruc',
				'number_phone',
				'address',
				'about',
				'name_contact',
				'last_name_contact',
				'position_contact',
				'telephone_contact',
				'email_contact',
				'created_at',
				'estado',
				'ubigeo_id',
				'address_extra_info',
				'number_workers',
				'industry',
        'url_image'
			];
}
