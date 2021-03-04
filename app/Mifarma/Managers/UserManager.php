<?php
namespace App\Mifarma\Managers;
class UserManager extends BaseManager {
    public function getRules()
    {
        $rules = [
            'email'=> 'required|email',
            'password'=> 'required',
            'fingerprint'=>'',
            'permissions'=> '',
            'last_login'=> '',
            'name'=> 'required',
            'last_name'=> 'required',
            'gender'=> '',
            'state'=> '',
            'address'=> '',
            'postal'=> '',
            'ubigeo_id'=> '',
            'user_sinch'=> '',
            'password_sinch'=> '',
            'country'=> '',
            'numdoc'=> 'required',
            'img'=> '',
            'tel'=> '',
            'birth_date'=> '',
            'estado'=> 'required',
            'usuario_created_id'=> '',
            'usuario_upd_id'=> '',
            'terminal'=> '',
            'terminal_upd'=> '',
            'deleted_at' => ''
        ];
        return $rules;
    }}
