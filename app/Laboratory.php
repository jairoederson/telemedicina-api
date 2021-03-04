<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model {

    protected $table = "laboratories";
    protected $fillable = [
        "users_id",
        "telephone","telephone_aux",
        "address", "ubigeo_id", "estado","name","address_extra_info","url_image"
    ];

}
