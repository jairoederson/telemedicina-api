<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
  protected $table = "doctor_schedule";

  // fillable
  protected $fillable = [
    "doctor_id",
    "days",
    "day_week",
    "start_time",
    "end_time",
    "status"
  ];
}
