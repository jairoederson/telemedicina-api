<?php
namespace App\Mifarma\Repositories;
use App\Mifarma\Entities\Role;
class RoleRepo extends BaseRepo{
    
    public function getModel()
    {
        return new Role;
    }

    
} 
