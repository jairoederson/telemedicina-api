<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    protected $table = "medicaments";

    protected $fillable = [
      'medicine',
      'frequency',
      'duration',
      'way_administration',
      'presentation',
      'dose',
      'quantity',
      'price',
      'sku',
      'um',
      'treatment_id',
    ];
}
