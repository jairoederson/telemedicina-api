<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'slug',
        'name',
        'permissions'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }
}
