<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QueryOffline extends Model
{
  protected $table = "query_offlines";

  // fillable
  protected $fillable = [
    "state",
    "voucher_id",
    "doctor_id",
    "patient_id",
    "receipt_id",
  ];
}
