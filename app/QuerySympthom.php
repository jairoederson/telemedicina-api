<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuerySympthom extends Model
{
  protected $table = "query_sympthoms";

  // fillable
  protected $fillable = [
    "query_id",
    "sympthom_id",
  ];
}
