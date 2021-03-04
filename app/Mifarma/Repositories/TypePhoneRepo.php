<?php
namespace App\Mifarma\Repositories;

use App\Mifarma\Entities\TypePhone;

class TypePhoneRepo extends BaseRepo
{

    public function getModel()
    {
        return new TypePhone;
    }

}
