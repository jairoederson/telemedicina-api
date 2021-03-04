<?php
namespace App\Mifarma\Managers;
class DetUserSocialProviderManager extends BaseManager {
    public function getRules()
    {
        $rules = [ 
            'id_provider'=> 'required',
            'users_id'=> '',
            'social_provider_id'=> 'required'
                  ];
        return $rules;
    }
}