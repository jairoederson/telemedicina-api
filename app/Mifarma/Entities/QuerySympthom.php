<?php
namespace App\Mifarma\Entities;
class QuerySympthom extends \Eloquent {
	protected $table = 'query_sympthoms';

    protected $fillable =
		[
      "query_id",
      "sympthom_id",
    ];
}
