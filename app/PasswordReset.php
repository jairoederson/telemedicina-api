<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = "reminders";

    protected $fillable = [
        "user_id",
        "code",
        "completed",
        "completed_at"
    ];
}
