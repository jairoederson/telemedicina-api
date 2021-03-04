<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    protected $table = "verifications_code";
    protected $fillable = [
        "user_id",
        "code_verify",
        "status",
        "phone",
        "code_country"
      ];
}
