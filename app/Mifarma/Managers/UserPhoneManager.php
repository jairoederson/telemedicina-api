<?php
namespace App\Mifarma\Managers;

class UserPhoneManager extends BaseManager
{
    public function getRules()
    {
        $rules = [
            'code'               => '',
            'number'             => 'required',
            'description'        => '',
            'type_phones_id'     => 'required',
            'users_id'           => 'required',
            'estado'             => 'required',
            'usuario_created_id' => '',
            'usuario_upd_id'     => '',
            'terminal'           => '',
            'terminal_upd'       => '',

        ];
        return $rules;
    }}
