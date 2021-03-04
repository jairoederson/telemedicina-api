<?php
namespace App\Mifarma\Entities;
class Role extends \Eloquent {
	protected $table = 'roles';
    
    protected $fillable = ['slug',
    						'name',
    						'permissions'
    						];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }
}