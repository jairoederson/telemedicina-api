<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassengerDataPatient extends Model
{
    //
    protected $table = 'passenger_data_patients';
    protected $fillable = ['type_passenger_id','type_document_id','patient_id','name_passenger','nro_document'];
    
    
}
