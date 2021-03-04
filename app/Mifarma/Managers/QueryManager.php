<?php
namespace App\Mifarma\Managers;
class QueryManager extends BaseManager {
    public function getRules()
    {
        $rules = [
          'doctor_id'=> 'required',
          'patient_id'=> 'required',
          'date'=> 'required',
          'price'=> 'required',
          'duration'=> 'required',
          'state'=> 'required',
          'symptom'=> 'required',
          'message' => 'required',
          'mode' => 'required',
          'video' => '',
          'appreciation' => '',
          'usuario_created_id' => '',
          'usuario_upd_id' => '',
          'terminal' => '',
          'terminal_upd' => '',
          'deleted_at' => '',
                  ];
        return $rules;
    }}
