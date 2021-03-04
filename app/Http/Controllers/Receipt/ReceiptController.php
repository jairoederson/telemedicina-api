<?php

namespace App\Http\Controllers\Receipt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Receipt;
use App\OrderAnalysis;
use App\Patient;

class ReceiptController extends Controller
{
    public function saveReceipt(Request $request){
      $patient_id = $request->get('patient_id');
      $patient = Patient::where("users_id", "=", $patient_id)->get();
      if(count($patient) == 0){
        return response()->json(['estado'=>false, 'code'=>404, 'message'=>'No se encontro al usuario paciente']);
      }
      $fields = $request->all();
      $order_id = $request->get('order_id');
      $order = OrderAnalysis::findOrFail($order_id);
      $order["state"] = "pagado";

      $order_updated = $order->save();
      // return response()->json($order_updated);
      $fields['patient_id'] = $patient[0]->id;
      $receipt = Receipt::create($fields);
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$receipt]);

    }

  
}
