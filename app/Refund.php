<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $table = "refunds";

    protected $fillable = [
        'refund_id',
        'charge_id',
        'amount',
        'reason',
        'date',
        'object',
        'metadata',
        'patient_id'
    ];
}
