<?php
namespace App\Mifarma\Entities;
class RoleUser extends \Eloquent {
	protected $table = 'role_users';
    
    protected $fillable = ['user_id',
    						'role_id'
    						];
}