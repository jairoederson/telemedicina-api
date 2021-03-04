<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDiagnostic extends Model
{
    protected $table = "type_diagnostics";

    protected $fillable = [
      'name',
      'description',
      'state',
    ];
}
