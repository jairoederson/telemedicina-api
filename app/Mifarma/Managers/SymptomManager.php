<?php
namespace App\Mifarma\Managers;
class SymptomManager extends BaseManager {
    public function getRules()
    {
        $rules = [
          'name'=> 'required',
          'description'=> '',
          'estado'=> 'required',
          'usuario_created_id'=> '',
          'usuario_upd_id'=> '',
          'terminal'=> '',
          'terminal_upd'=> '',
          'deleted_at' => ''
            ];
        return $rules;
    }}
