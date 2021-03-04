<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryQuestion extends Model
{

  const CATEGORY_ACTIVE = '1';
  const CATEGORY_DESACTIVE = '0';

  protected $table = "category_questions";

  protected $fillable = [
    "title",
    "description",
    "state",
  ];
}
