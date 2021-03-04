<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    protected $table = 'ubigeos';

      // fillable
      protected $fillable = [
        "country_id",
        "ubigeo",
        "departamento",
        "provincia",
        "distrito",
        "estado",
        "created_at",
        "updated_at",
        "usuario_created_id",
        "usuario_upd_id",
        "terminal",
        "terminal_upd"
      ];
}
