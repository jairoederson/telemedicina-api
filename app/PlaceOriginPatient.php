<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceOriginPatient extends Model
{
    protected $table = 'place_origin_patients';
    protected $fillable = ['ubigeo_id','patient_id'];
}
