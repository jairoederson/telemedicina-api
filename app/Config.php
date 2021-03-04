<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //
    
    protected $fillable = [
        "estado","email","description","price","doctor_price","titulo","hora_final","hora_inicio"
    ];

}
