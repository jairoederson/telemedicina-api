<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Sofa\Eloquence\Eloquence;

class Country extends Model
{
    // use Eloquence;


    protected $table = 'countries';

    // fillable
    protected $fillable = [
      "name",
      "description",
      "codigo_postal",
      "estado",
      "created_at",
      "updated_at",
      "usuario_created_id",
      "usuario_upd_id",
      "terminal",
      "terminal_upd"
    ];
    // protected $guarded  = ['id'];
    // protected $searchableColumns = ['name'];
}
