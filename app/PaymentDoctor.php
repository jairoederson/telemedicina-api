<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDoctor extends Model
{
   protected $table = "payment_doctors";
   
   protected $fillable = [
      "doctor_id","amount","payment_description","year","month","estado"
    ];
}
