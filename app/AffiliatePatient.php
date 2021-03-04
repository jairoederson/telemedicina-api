<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AffiliatePatient extends Model
{
  protected $table = "affiliate_patients";

  // fillable
  protected $fillable = [
    "affiliate_id",
    "company_id",
    "isResponsible",
  ];
}
