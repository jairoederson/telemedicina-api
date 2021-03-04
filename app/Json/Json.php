<?php

  namespace App\Json;

  class Json {
    // meses del año numero a abreviatura
    const MONTH_TO_ABR = array(
      "01"=>"ene.",
      "02"=>"feb.",
      "03"=>"mar.",
      "04"=>"abr.",
      "05"=>"may.",
      "06"=>"jun.",
      "07"=>"jul.",
      "08"=>"ago.",
      "09"=>"set.",
      "10"=>"oct.",
      "11"=>"nov.",
      "12"=>"dic.",
    );

    // mes del año abreviatura a numero
    const ABR_TO_MONTH = array(
      "ene." => "01",
      "feb." => "02",
      "mar." => "03",
      "abr." => "04",
      "may." => "05",
      "jun." => "06",
      "jul." => "07",
      "ago." => "08",
      "set." => "09",
      "oct." => "10",
      "nov." => "11",
      "dic." => "12",
    );
  }
?>
