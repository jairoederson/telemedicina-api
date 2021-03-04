<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuiaControlInterno extends Model
{
    protected $fillable = [
        "id_solicitud",
        "toma_muestras_id",
        "origen",
        "destino",
        "repartidor",
        "comentario",
        "hora_recepcion"

    ];
}
