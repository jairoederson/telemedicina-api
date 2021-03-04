<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = "cards";

    protected $fillable = [
      "owner_id",
      "card_type",
      "card_number",
      "cvv",
      "due_date",
      "country",
      "type_plan",
      "type_owner",
      "status"
    ];
}
