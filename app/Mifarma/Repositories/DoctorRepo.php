<?php
namespace App\Mifarma\Repositories;
use App\Mifarma\Entities\Doctor;
class DoctorRepo extends BaseRepo{
    
    public function getModel()
    {
        return new Doctor;
    }

    
} 
