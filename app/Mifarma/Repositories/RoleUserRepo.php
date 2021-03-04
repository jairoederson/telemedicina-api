<?php
namespace App\Mifarma\Repositories;
use App\Mifarma\Entities\RoleUser;
class RoleUserRepo extends BaseRepo{
    
    public function getModel()
    {
        return new RoleUser;
    }

    
} 
