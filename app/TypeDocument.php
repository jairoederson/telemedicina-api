<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
  const TYPE_DOCUMENT_ACTIVE = '1';
  const TYPE_DOCUMENT_DESACTIVE = '0';

  protected $table = "type_documents";

  protected $fillable = [
    "type_name",
    "description",
    "estado",
  ];
}
