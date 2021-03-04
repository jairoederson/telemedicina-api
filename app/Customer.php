<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = "customers";

  // fillable
  protected $fillable = [
    "object",
    "customer_id",
    "creation_date",
    "email",
    "antifraud_details",
    "patient_id",
  ];
}
