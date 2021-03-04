<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notifications";

    protected $fillable = [
      'title',
      'body',
      'data',
      'seen',
      'user_id',
      'type_notification'
    ];
}
