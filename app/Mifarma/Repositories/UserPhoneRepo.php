<?php
namespace App\Mifarma\Repositories;

use App\Mifarma\Entities\UserPhone;

class UserPhoneRepo extends BaseRepo
{

    public function getModel()
    {
        return new UserPhone;
    }

    public function findPhonesUser($user_id)
    {
        $numerosTelefonicos = UserPhone::select('user_phones.*'
            , 'type_phones.name as name_type_phones'
            , 'type_phones.description as description_type_phones')
            ->join('type_phones', function ($join) {
                $join->on('user_phones.type_phones_id', '=', 'type_phones.id');
            })
            ->where('user_phones.users_id', $user_id)
            ->where('user_phones.estado', 1)
            ->get();

        return $numerosTelefonicos;
    }
    public function findPhonesUserAll($user_id)
    {
        $numerosTelefonicos = UserPhone::select('user_phones.*'
            , 'type_phones.name as name_type_phones'
            , 'type_phones.description as description_type_phones')
            ->join('type_phones', function ($join) {
                $join->on('user_phones.type_phones_id', '=', 'type_phones.id');
            })
            ->where('user_phones.users_id', $user_id)
            ->get();

        return $numerosTelefonicos;
    }

}
