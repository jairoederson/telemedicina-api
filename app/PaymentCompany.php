<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentCompany extends Model
{
   protected $table = "payment_companies";
   
   protected $fillable = [
      "company_id","amount","payment_description","year","month","estado","voucher"
    ];
}
