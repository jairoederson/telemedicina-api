<?php
namespace App\Mifarma\Repositories;
use App\Mifarma\Entities\Patient;
class PatientRepo extends BaseRepo{
    
    public function getModel()
    {
        return new Patient;
    }

    
} 
