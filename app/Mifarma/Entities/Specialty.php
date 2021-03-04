<?php
namespace App\Mifarma\Entities;
class Specialty extends \Eloquent {
	protected $table = 'specialties';
    
    protected $fillable = ['name',
    						'description',
    						'estado',			
							'usuario_created_id',
							'usuario_upd_id',
							'terminal',
							'terminal_upd',
							'deleted_at'
    						];
}