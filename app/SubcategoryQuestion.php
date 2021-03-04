<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubcategoryQuestion extends Model
{
    protected $fillable = [
        "title",
        "description",
        "status",
        'category_id'
    ];
}
