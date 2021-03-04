<?php
namespace App\Mifarma\Entities;
class DetUserSocialProvider extends \Eloquent {
	protected $table = 'det_users_social_providers';
    
    protected $fillable = ['id_provider',
    						'users_id',
    						'social_provider_id'
    						];
}