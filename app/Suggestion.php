<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
  const SUGGESTION_ACTIVE = '1';
  const SUGGESTION_DESACTIVE = '0';

  protected $table = "suggestions";

  protected $fillable = [
    "suggestion",
    "email",
    "category_suggestion_id",
    "state",
  ];
}
