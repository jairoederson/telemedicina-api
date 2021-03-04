<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderAnalysis extends Model
{
  const STATE_PENDIENTE = 'pendiente';
  const STATE_PAGADO = 'pagado';
  const STATE_ESPERA = 'en espera';
  const STATE_REALIZADO = 'realizado';

  protected $table = "order_analysis";

  protected $fillable = [
    "patient_id",
    "doctor_id",
    "state",
    "state_notification",
    "details",
    "price",
    'query_offline_id'
  ];
}
