<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TomaMuestra extends Model
{
    protected $fillable = [
        "id_solicitud",
        "patient_id",
        "code",
        "codigo_barra",
        'material',
        'examen',
        'state',
        'priority',
        'motivo',
        'comentario',
        'eliminado',
    ];
}
