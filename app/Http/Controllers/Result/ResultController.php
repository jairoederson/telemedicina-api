<?php

namespace App\Http\Controllers\Result;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderAnalysis;
use App\Result;

class ResultController extends Controller
{
    public function saveResult(Request $request){
      $fields = $request->all();
      // return response()->json($fields);

      $order_id = $request->get('order_id');
      $order = OrderAnalysis::findOrFail($order_id);
      $order['state'] = "realizado";
      $order->save();

      $result = Result::create($fields);

      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);

    }
    public function getReceipt(Request $request){
      $order_id = $request->get('order_id');
      $result = Result::where("order_id", "=", $order_id)->get();

      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result[0]]);
    }
}
