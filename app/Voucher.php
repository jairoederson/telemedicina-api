<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
  protected $table = 'vouchers';

    // fillable
    protected $fillable = [
      "code",
      "nro_voucher",
      "code_bar",
      "price",
      "quantity",
      "concept_id",
      "um_id",
      "type_voucher_id",
      "state",
      "patient_id",
    ];
}
