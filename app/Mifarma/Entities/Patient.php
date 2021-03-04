<?php
namespace App\Mifarma\Entities;
class Patient extends \Eloquent {
	protected $table = 'patients';
    
    protected $fillable = ['ocupation',
    						'num_attentions',
    						'users_id'
    						];
}