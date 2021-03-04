<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $table = "queries";

    // fillable
    protected $fillable = [
      "doctor_id",
      "patient_id",
      "date",
      "price",
      "duration",
      "state",
      "symptom",
      "message",
      "mode",
      "video",
      "appreciation",
      "documents",
      "querytime",
      "statusquery",
      "modalidad",
      "imagesSymptom",
      'usuario_created_id',
			'usuario_upd_id',
			'terminal',
			'terminal_upd',
			'deleted_at',
    ];

    // public function treatments(){
    //   return $this->hasMany(Treatment::class);
    // }
}
