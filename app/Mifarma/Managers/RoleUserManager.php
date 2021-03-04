<?php
namespace App\Mifarma\Managers;
class RoleUserManager extends BaseManager {
    public function getRules()
    {
        $rules = [ 
            'user_id'=> 'required',
            'role_id'=> 'required'
                  ];
        return $rules;
    }}