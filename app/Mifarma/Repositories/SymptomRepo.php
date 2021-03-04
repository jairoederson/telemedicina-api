<?php
namespace App\Mifarma\Repositories;
use App\Mifarma\Entities\Symptom;
class SymptomRepo extends BaseRepo{

    public function getModel()
    {
        return new Symptom;
    }

    public function getSymptom()
    {
        $symptom =Symptom::select('symptom.*')
                    ->where('estado',1)
                    ->get();
        return $symptom;
    }
    
}
