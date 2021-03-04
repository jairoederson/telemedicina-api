<?php
namespace App\Mifarma\Managers;
class QueryManager extends BaseManager {
  public function getRules()
  {
      $rules = [
        "query_id" => 'required',
        "sympthom_id" => 'required',
      ];
      return $rules;
  }
}
