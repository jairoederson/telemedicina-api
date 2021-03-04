<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  const QUESTION_ACTIVE = '1';
  const QUESTION_DESACTIVE = '0';
  const QUESTION_NO_ANSWERED = '0';
  const QUESTION_CHECKED = '1';
  const QUESTION_ANSWERED = '2';

  protected $table = "questions";

  protected $fillable = [
    "title",
    "category_id",
    "question",
    "answer",
    "email",
    "status",
    "state",
  ];
}
