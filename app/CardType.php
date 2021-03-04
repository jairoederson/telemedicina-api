<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    protected $table = "type_card";

    protected $fillable = [
      "name",
      "img",
      "description",
    ];
}
