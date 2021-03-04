<?php

namespace App;

use \Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
  protected $table = "receipts";

  protected $fillable = [
    "order_id",
    "patient_id",
    "nro_receipt",
    "amount",
    "indicacion_general",
  ];
}
