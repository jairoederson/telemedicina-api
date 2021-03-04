<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
  const ANSWER_ACTIVE = '1';
  const ANSWER_DESACTIVE = '0';

  protected $table = "answers";

  protected $fillable = [
    "category_id",
    "answer",
    "question",
    "state",
    "question_frequency"
  ];
}
