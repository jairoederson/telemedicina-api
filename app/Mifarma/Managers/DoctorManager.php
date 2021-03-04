<?php
namespace App\Mifarma\Managers;
class DoctorManager extends BaseManager {
    public function getRules()
    {
        $rules = [
            'specialty_id'=> '',
            'id_cmp'=> '',
            'specialty'=> '',
            'qualification'=> '',
            'linkedIn'=> '',
            'about_me'=> '',
            'status'=>'',
            'users_id' => 'required'
        ];
        return $rules;
    }
  }
