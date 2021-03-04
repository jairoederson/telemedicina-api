<?php

namespace App\Http\Controllers\Culqi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Patient;
use App\Charge;
use App\Refund;
use App\OrderAnalysis;

class CulqiController extends Controller
{
  
    public function createChargeCulqi(Request $request)
    {
      $token = $request->get('card_id');
      // Exceptions
      try {
        // $SECRET_KEY = "sk_test_ebVxeuehD8qDwdKx";
        $SECRET_KEY = "sk_test_86cacc97eccc2e6f";
        $culqi = new \Culqi\Culqi(array('api_key' => $SECRET_KEY));

        $charge = $culqi->Charges->create(
          array(
            "amount" => 5000,
            "currency_code" => "PEN",
            "email" => "test@culqi.com",
            "description" => "Consulta Médica",
            "source_id" => $token,
          )
        );

        $patient = Patient::where('users_id', $request->patient_id)->get();

        $chargeToSave = array(
          'object' => $charge->object,
          'charge_id' => $charge->id,
          'amount' => $charge->amount,
          'currency' => $charge->currency_code,
          'patient_id' => $patient[0]->id
        );
        
        Charge::create($chargeToSave);

        return response()->json($charge);

      } catch (\Exception $e) {
        return json_decode($e->getMessage(), true);
      }
    }

    public function createChargeCulqiAnalysis(Request $request)
    {
      $token = $request->get('card_id');
      $patient_id = $request->get('patient_id');
      $price = $request->get('price');

      try {
        $SECRET_KEY = "sk_test_86cacc97eccc2e6f";
        $culqi = new \Culqi\Culqi(array('api_key' => $SECRET_KEY));

        $charge = $culqi->Charges->create(
          array(
            "amount" => $price,
            "currency_code" => "PEN",
            "email" => "test@culqi.com",
            "description" => "Orden de Análisis médico",
            "source_id" => $token,
          )
        );

        $fields = array(
          "patient_id" => $patient_id,
          "price" => $price,
          "description" => "Orden de análisis de laboratorio",
          "state" => "0",
        );

        $order = OrderAnalysis::findOrFail($request->get('order_id'));
        $order->state = 'pagado';
        $order->save();
        return response()->json($charge);

      } catch (\Exception $e) {
        return json_decode($e->getMessage(), true);
      }
    }

    public function saveCardCulqi(Request $request)
    {
      // $SECRET_KEY = "sk_test_ebVxeuehD8qDwdKx";
      $SECRET_KEY = "sk_test_86cacc97eccc2e6f";

      $token = $request->get('token_culqi');
      $user_id = $request->get('user_id');
      $is_main_card = $request->get('is_main_card');

      // Obtener USUARIO
      $user = \DB::table('users')
        ->where('users.id', $user_id)
        ->get();

      // Registrar usuario en culqi
      $customer_id = "";

      $patient = \DB::table('patients')
      ->where('patients.users_id', $user_id)
      ->get();

      $culqi = new \Culqi\Culqi(array('api_key' => $SECRET_KEY));

      try {
        $customers = \DB::table('customers')
        ->where('customers.patient_id', $patient[0]->id)
        ->get();
        if(count($customers)==0){
          $custom = $culqi->Customers->create(
            array(
              "first_name" => $user[0]->name,
              "last_name" => $user[0]->last_name,
              "email" => $user[0]->email,
              "address" => $user[0]->country,
              "address_city" => $user[0]->address,
              "country_code" => "PE",
              "phone_number" => $user[0]->tel
            )
          );
          $customer_id = $custom->id;
          $antifraud_details = json_encode($custom->antifraud_details);
          $fields = array(
            "object" => $custom->object,
            "customer_id"  => $custom->id,
            "creation_date"  => strval($custom->creation_date),
            "email"  => $custom->email,
            "antifraud_details"  => $antifraud_details,
            "patient_id"  => $patient[0]->id,
          );
          Customer::create($fields);

        }else{

          $customer_id = $customers[0]->customer_id;

        }

      } catch (\Exception $e) {

        $res = json_decode($e->getMessage(), true);
        return $res;
      }

      // registrar tarjeta
      try {
        $card = $culqi->Cards->create(
          array(
            "customer_id" => $customer_id,
            "token_id" => $token
          )
        );
        if($is_main_card == true){
          $patient_to_update = Patient::findOrFail($patient[0]->id);
          $patient_to_update->card_id = $card->id;
          $patient_to_update->save();
        }
        return response()->json($card);
      } catch (\Exception $e) {
        return json_decode($e->getMessage(), true);
      }

    }

    public function getCardsUserCulqi($user_id)
    {
      $SECRET_KEY = "sk_test_86cacc97eccc2e6f";
      $culqi = new \Culqi\Culqi(array('api_key' => $SECRET_KEY));

      $patient = \DB::table('patients')
      ->where('patients.users_id', $user_id)
      ->get();

      if(count($patient)==0){
        return response()->json(array("error"=>404, "message"=>"Tarjetas del usuario no encontrada", "cards"=>[], "default_card"=>(object)[]));
      }

      $customer = \DB::table('customers')
      ->where('customers.patient_id', $patient[0]->id)
      ->get();

      if(count($customer)==0){
        return response()->json(array("error"=>404, "message"=>"Tarjetas del usuario no encontrada", "cards"=>[], "default_card"=>(object)[]));
      }

      try {
        $customers = $culqi->Customers->get($customer[0]->customer_id);
        // return response()->json($customers->cards);
        
        $cards_user = [];
        $default_card = (object)[];
        $card_id = "";
        if($patient[0]->id != "" || $patient[0]->id != null){
          $card_id = $patient[0]->card_id;
        }

        $isThereDefaultCard = false;
        foreach ($customers->cards as $key => $card) {
          try {
            if($card->active == true){
              if($card->id == $card_id){
                $card->selected = true;
                $default_card = $card;
                $isThereDefaultCard = true;
              }else{
                $card->selected = false;
                array_push($cards_user, $card);
                $isThereDefaultCard = false;
              }

            }
          } catch (\Exception $e) {
          }
        }
        
        // Establecemos una tarjeta por defecto
        /*if($isThereDefaultCard == false){
          $default_card = $cards_user[0];
          array_splice($cards_user, 0, 1);
        }*/

        return response()->json(["default_card"=>$default_card, "cards"=>$cards_user]);

      } catch (\Exception $e) {
        return json_decode($e->getMessage(), true);
      }

    }

    public function getCardUserCulqi($card_id)
    {
      // $SECRET_KEY = "sk_test_ebVxeuehD8qDwdKx";
      $SECRET_KEY = "sk_test_86cacc97eccc2e6f";
      $culqi = new \Culqi\Culqi(array('api_key' => $SECRET_KEY));

      try {
        $card = $culqi->Cards->get($card_id);
        return response()->json($card);

      } catch (\Exception $e) {
        return json_decode($e->getMessage(), true);
      }

    }

    public function updateUserCardCulqi(Request $request)
    {
      $card_id = $request->get('card_id');
      $metadata = $request->get('metadata');

      // $SECRET_KEY = "sk_test_ebVxeuehD8qDwdKx";
      $SECRET_KEY = "sk_test_86cacc97eccc2e6f";
      $culqi = new \Culqi\Culqi(array('api_key' => $SECRET_KEY));

      try {
        $card_updated = $culqi->Cards->update($card_id,
          array(
            "metadata" => $metadata
          )
        );

        return response()->json($card_updated);
      } catch (\Exception $e) {
        return json_decode($e->getMessage(), true);
      }

    }

    public function deleteUserCardCulqi($card_id)
    {
      // $SECRET_KEY = "sk_test_ebVxeuehD8qDwdKx";
      $SECRET_KEY = "sk_test_86cacc97eccc2e6f";
      $culqi = new \Culqi\Culqi(array('api_key' => $SECRET_KEY));

      $patient = Patient::where('card_id', $card_id)->get();
      if(count($patient) != 0){
        $patient_to_update = Patient::findOrFail($patient[0]->id);
        $patient_to_update->card_id = "";
        $patient_to_update->save();
      }
      try {
        $card_deleted = $culqi->Cards->delete($card_id);
        return response()->json($card_deleted);

      } catch (\Exception $e) {
        return json_decode($e->getMessage(), true);
      }
    }

    public function setUserMainCard(Request $request)
    {
      $user_id = $request->get('user_id');
      $card_id = $request->get('card_id');

      $patient = \DB::table('patients')
      ->where('patients.users_id', $user_id)
      ->get();

      if(count($patient)==0){
        return response()->json(["message"=>"User not founded", "status", 404]);
      }

      $patient_to_update = Patient::findOrFail($patient[0]->id);
      $patient_to_update->card_id = $card_id;
      $patient_to_update->save();

      return response()->json(["message"=>"Card changed as principal", "status"=>200, "card_id"=>$card_id]);

    }

    public function getLastCharge($patientId)
    {
      $charges = Charge::where('patient_id', $patientId)
      ->orderBy('id', "desc")
      ->get();
      return response()->json(['message'=>'Cargo encontrado', 'code'=>201, 'status'=>false, 'data'=>$charges[0]]);
    }

    public function saveRefound(Request $request)
    {
      // $SECRET_KEY = "sk_test_ebVxeuehD8qDwdKx";
      $SECRET_KEY = "sk_test_86cacc97eccc2e6f";
      $culqi = new \Culqi\Culqi(array('api_key' => $SECRET_KEY));

      try {
        $refund = $culqi->Refunds->create(
          array(
            "amount" => $request->get('amount'),
            "charge_id" => $request->get('charge_id'),
            "reason" => "solicitud_comprador",
          )
        );

        $patient = Patient::where('users_id', $request->patient_id)->get();
        
        $refundToSave = array(
          'refund_id' => $refund->id,
          'charge_id' => $refund->charge_id,
          'amount' => $refund->amount,
          'reason' => $refund->reason,
          'date' => $refund->creation_date,
          'object' => $refund->object,
          'metadata' => json_encode($refund->metadata),
          'patient_id' => $patient[0]->id
        );

        Refund::create($refundToSave);

        return response()->json($refund);

      } catch (\Exception $e) {

        return json_decode($e->getMessage(), true);
      
      }
    }

    public function getRefound($refoundId)
    {

    }

    public function getRefounds()
    {

    }

    public function updateRefound(Request $request)
    {

    }
}
