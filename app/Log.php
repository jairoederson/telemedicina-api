<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    
    protected $fillable = [
        "users_id","action","table_name","id_row"
    ];

}
