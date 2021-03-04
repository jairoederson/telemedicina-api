<?php

namespace App\Http\Controllers\Medicament;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicamentController extends Controller
{
    public function autocompleteMedicament($medicament){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://mifarma.vexecommerce.com/rest/V1/Autocomplete/".$medicament);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $resultado = curl_exec ($ch);

        return json_decode($resultado);
    }

    public function getDetailMedicament($sku){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://mifarma.vexecommerce.com/rest/default/V1/products/".$sku);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $resultado = curl_exec ($ch);

        return json_decode($resultado, true);
    }
}
