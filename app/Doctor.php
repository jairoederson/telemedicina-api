<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  protected $table = "doctors";

  // fillable
  protected $fillable = [
    "specialty",
    "id_cmp",
    "qualification",
    "linkedIn",
    "about_me",
    "users_id",
    "specialty_id",
    "status", // (0: desconectado, 1: conectado, 2: ocupado)
    "status_sinch", // (0: desconectado, 1: conectado, 2: ocupado)
    "firma_digital",
    "sede_id"
  ];
}
