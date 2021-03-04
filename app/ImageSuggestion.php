<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageSuggestion extends Model
{
  const IMAGE_SUGGESTION_ACTIVE = '1';
  const IMAGE_SUGGESTION_DESACTIVE = '0';

  protected $table = "image_suggestions";

  protected $fillable = [
    "image",
    "state",
    "suggestion_id",
  ];
}
