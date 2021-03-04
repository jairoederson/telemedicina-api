<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
  protected $table = "results";

  protected $fillable = [
    "order_id",
    "result",
  ];
}
