<?php
namespace App\Mifarma\Entities;
class SocialProvider extends \Eloquent {
	protected $table = 'social_providers';
    
    protected $fillable = ['name',
    						'description',
    						'estado',			
							'usuario_created_id',
							'usuario_upd_id',
							'terminal',
							'terminal_upd'
    						];
}