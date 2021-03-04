<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderAnalysisPayment extends Model
{
    protected $table = "order_analysis";

    protected $fillable = [
        "patient_id",
        "price",
        "description",
        "state",
    ];
}
