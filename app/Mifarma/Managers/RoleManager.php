<?php
namespace App\Mifarma\Managers;
class RoleManager extends BaseManager {
    public function getRules()
    {
        $rules = [ 
            'slug'=> 'required',
            'name'=> 'required',
            'permissions'=> ''
                  ];
        return $rules;
    }}