<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformeResultado extends Model
{
   protected $fillable = [
     'id_solicitud',
     'status'
   ];

}
