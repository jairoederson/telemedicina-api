<?php

namespace App\Http\Controllers\Voucher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Voucher;

class VoucherController extends Controller
{
    // Verificamos si el comprobante es autentico
    public function verifyVoucherByCode(Request $request){
      $code = $request->get('code');
      $nro_voucher = $request->get('nro_voucher');
      $type_voucher = $request->get('type_voucher');

      // return $type_voucher;
      $voucher = Voucher::where('code', '=', $code)
              ->where('nro_voucher', '=', $nro_voucher)
              ->where('type_voucher_id', '=', $type_voucher)
              ->get();

      if(count($voucher)>0){
        if($voucher[0]->state == 'pendiente'){
          return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$voucher[0]]);

        }else if($voucher[0]->state == 'cancelado'){
          return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"El comprobante de pago ya fue usado", 'data'=>$voucher[0]]);

        }else if($voucher[0]->state == 'anulado'){
          return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"El comprobante esta anulado", 'data'=>$voucher[0]]);
        }
      }else{
        return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"El comprobante de pago ingresado no existe en el sistema"]);

      }
    }

    public function verifyVoucherByBarCode(Request $request){
      $code_bar = $request->get('code_bar');

      $voucher = Voucher::where('code_bar', '=', $code_bar)->get();

      if(count($voucher) > 0){
        if($voucher[0]->state == 'pendiente'){
          return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$voucher[0]]);

        }else if($voucher[0]->state == 'cancelado'){
          return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"El comprobante de pago ya fue usado", 'data'=>$voucher[0]]);

        }else if($voucher[0]->state == 'anulado'){
          return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion El comprobante esta anulado", 'data'=>$voucher[0]]);
        }
      }else{
        return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"El comprobante de pago ingresado no existe en el sistema"]);

      }
    }

    public function saveVoucher(Request $request){
      $fields = $request->all();
      $voucher = Voucher::create($fields);
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$voucher]);

    }

    public function updateStateVoucher(Request $request){
      $voucherId = $request->get('voucherId');
      $state = $request->get('state');

      $voucher = Voucher::findOrFail($voucherId);
      if($voucher){
        $voucher->state = $state;
        $voucherUpdated = $voucher->save();
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$voucherUpdated]);
      }else{
        return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"Comprobante no encontrado", 'data'=>[]]);
      }
    }

}
