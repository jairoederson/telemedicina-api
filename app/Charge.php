<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $table = "charges";

    protected $fillable = [
        'object',
        'charge_id',
        'amount',
        'currency',
        'patient_id'
    ];
}
