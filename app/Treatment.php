<?php

namespace App;
use App\Query;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = "treatments";

    protected $fillable = [
      'validity',
      'general_recomendation',
      'state_notification',
      'query_offline_id',
      'query_id',
      'indicacion_general',
    ];

    // public function query(){
    //   return $this->belongsTo(Query::class);
    // }

    public function setValidityAttribute($value)
    {
        $this->attributes['validity'] = Carbon::now()->addDays($value)->format('Y-m-d');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::now()->format('Y-m-d');
    }

}
