<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamenResultado extends Model
{
    protected $fillable = [
        "examen_id",
        "id_solicitud",
        "valor",
        "comentario",
        "status",
        "aprobado",
        "validado"
    ];
}
