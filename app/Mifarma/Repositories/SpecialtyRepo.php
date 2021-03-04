<?php
namespace App\Mifarma\Repositories;
use App\Mifarma\Entities\Specialty;
class SpecialtyRepo extends BaseRepo{
    
    public function getModel()
    {
        return new Specialty;
    }

    public function getSpecialties()
    {
        $specialties =Specialty::select('specialties.*')
                    ->where('estado',1)
                    ->get();
        return $specialties;
    }
    public function postSpecialties($symptom)
    {

        $specialties =Specialty::select('specialties.*')
        			->join('det_specialties_diseases', function($join) {
                              $join->on('det_specialties_diseases.specialty_id','=', 'specialties.id');
                            })
        			->join('diseases', function($join) {
                              $join->on('det_specialties_diseases.diseas_id','=', 'diseases.id')
                              ->where('diseases.estado','=',1);
                            })
        			->join('symptom', function($join) {
                              $join->on('symptom.diseas_id','=', 'diseases.id')
                              ->where('symptom.estado','=',1);
                            })
                    ->where('specialties.estado',1)
                    ->whereIn('symptom.name', array($symptom))
                    ->groupBy('specialties.id')
                    ->get();


        return $specialties;
    }


    
} 
