<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySuggestion extends Model
{
  const CATEGORY_SUGGESTION_ACTIVE = '1';
  const CATEGORY_SUGGESTION_DESACTIVE = '0';

  protected $table = "category_suggestions";

  protected $fillable = [
    "category",
    "description",
    "state",
  ];
}
