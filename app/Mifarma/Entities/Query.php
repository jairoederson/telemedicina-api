<?php
namespace App\Mifarma\Entities;
class Query extends \Eloquent {
	protected $table = 'queries';

    protected $fillable =
		[
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
      'usuario_created_id',
			'usuario_upd_id',
			'terminal',
			'terminal_upd',
			'deleted_at'
    ];
}
