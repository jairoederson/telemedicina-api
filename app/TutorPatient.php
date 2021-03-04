<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorPatient extends Model
{
    protected $fillable = [
        'user_id',
        'patient_id',
        'ocupation',
        'vinculo',
        'type_document_id',
        'numdoc'
    ];
}
