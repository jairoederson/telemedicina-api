<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReprogramingQuery extends Model
{
  protected $table = "reprogramming_queries";

  protected $fillable = [
    "query_id",
    "date",
    "querytime",
    "diasemana"
  ];
}
