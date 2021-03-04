<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Doctor;
use App\User;
use App\AcademincTraining;
use App\WorkExperience;
use App\UserPhone;
use App\Query;
use App\Company;
use App\Log;
use App\PaymentCompany;
use Date;
use Sentinel;

class LiquidacionController extends Controller {

    public function index() {
        return view('admin/liquidaciones');
    }

    public function listarPagosAsociadosHistorial(Request $request) {
        $items = PaymentCompany::join("companies", "payment_companies.company_id", "=", "companies.id")
                ->select('payment_companies.*', 'companies.name')
                ->where("payment_companies.estado", "1")
                ->get();
        
        for ($i = 0, $size = count($items); $i < $size; ++$i) {
            $fecha = Date::createFromFormat('!m', $items[$i]['month']);
            $mesTexto = strftime("%B", $fecha->getTimestamp());
            $items[$i]['monthName'] = $mesTexto;
            if ($items[$i]['estado'] == 1){
                $items[$i]['estado'] = "Pagado";
            }else{
                $items[$i]['estado'] = "Pendiente";
            }

            if ($items[$i]['voucher']){
                $voucher = $items[$i]['voucher'];
                $id = $items[$i]['id'];
                $items[$i]['voucher'] = "<button title=\"Ver\" onclick=\"location.href='/images/$voucher'\" class=\"btn-crud btn btn-format\">
                        <span class=\"glyphicon glyphicon-eye-open\" aria-hidden=\"true\"></span>
                      </button><button title=\"Ver\" onclick=\"eliminar($id)\" class=\"btn-crud btn btn-format\">
                        <span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span>
                      </button>";
            }
        }



        return response()->json($items);
    }

}
