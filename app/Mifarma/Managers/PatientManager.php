<?php
namespace App\Mifarma\Managers;
class PatientManager extends BaseManager {
    public function getRules()
    {
        $rules = [
            'ocupation'=> '',
            'num_attentions'=> '',
            'weight'=> '',
            'size'=> '',
            'users_id'=> 'required',
                  ];
        return $rules;
    }}
