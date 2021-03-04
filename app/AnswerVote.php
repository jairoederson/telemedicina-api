<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerVote extends Model
{

  protected $table = "answer_votes";

  protected $fillable = [
    "answer_id",
    "user_id",
    "vote",
  ];
}
