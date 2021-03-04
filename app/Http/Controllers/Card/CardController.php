<?php

namespace App\Http\Controllers\Card;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Card;
use App\Patient;
use App\CardType;

class CardController extends Controller
{
	public function getCards()
    {
    	//Obtenemos todos las tarjetas
    	$cards = Card::all();

    	//Enviar JSON
			return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Listado Exitoso", 'data'=>$cards]);

        // return response()->json(['data' => ], 200);
    }


    public function create(Request $request)
    {

			$card_number = $request->get('card_number');
			$cvc = $request->get('cvc');
			list($exp_month, $exp_year) = explode("/", $request->get('due_date'));

			// return response()->json(["data" => $exp_year]);
			// Ingresamos nuestro key generado en https://stripe.com

			// BRUCE
			// \Stripe\Stripe::setApiKey("sk_test_bQYwJHe0YU38m1p8i73t4KzN");

			// PROPIO
			\Stripe\Stripe::setApiKey("sk_test_mtLlCqQqN3rYMVJG7FUfOfoh");

			// PUBLIC KEY PROPIO
			// \Stripe\Stripe::setApiKey("pk_test_pTVgTx51yxGUmfDHuo18i3A0");
			try{

				$response = \Stripe\Token::create(array(
					"card" => array(
						"number"    => $card_number,
						"exp_month" => $exp_month,
						"exp_year"  => $exp_year,
						"cvc"       => $cvc,
						// "name"      => "alfredo yupanqui"
					)));

					$user_id = $request->get('owner_id');
					$patient = Patient::where('users_id', '=' ,$user_id)->get();

					//Se instancia el modelo Card (tarjeta) y se cargan los datos
					$card 				= new Card;
					$card->card_number 	= $request->card_number;
					$card->cvv 			= $request->cvc;
					$card->due_date  	= "20".$exp_year."/".$exp_month."/"."01";
					$card->type_plan    = $request->type_plan;
					$card->country = $request->country;
					//$card->owner_id		= $request->owner_id;
					$card->owner_id		= $patient[0]->id;
					$card->type_owner   = $request->type_owner;

					$card->status = "approved";

					if($response->card->brand == "Visa"){
						$card->card_type    = "1";
					}else if($response->card->brand == "MasterCard"){
						$card->card_type    = "2";
					}else if($response->card->brand == "American Express"){
						$card->card_type    = "3";
					}else if($response->card->brand == "Diners Club"){
						$card->card_type    = "4";
					}else if($response->card->brand == "Discover"){
						$card->card_type    = "5";
					}else if($response->card->brand == "JCB"){
						$card->card_type    = "6";
					}else if($response->card->brand == "UnionPay"){
						$card->card_type    = "7";
					}

					//Guardamos los cambios realizados en la tarjeta
					$card->save();

					//Enviar JSON
					// return response()->json(['data' => $card], 200);
					return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento Exitoso", 'data'=>$card]);
			}
			catch(\Stripe\Error\Base  $a){
				return response()->json(['estado'=>false, 'code'=>'400', 'message'=>"Datos de la tarjeta incorrecto", "error"=>$a->jsonBody["error"],'data'=>[]]);
			}




    }

    public function get($id)
    {
    	//Obtenemos informacion de una tarjeta segun su id
    	$card = Card::find($id);

    	//Enviar JSON
    	// return response()->json(['data' => $card], 200);
			return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion Exitosa", 'data'=>$card]);

    }

    public function getCardsByOwner($id)
    {

			$patient = Patient::where('users_id', '=' ,$id)->get();

			//Obtenemos las tarjetas segun su propietario (paciente,empresa)
    	$cards = Card::where('owner_id', '=' ,$patient[0]->id)->get();
			$count_pagos_pendientes = 0;
			foreach ($cards as $key => $card) {
				if($card->status == 'denied'){
					$count_pagos_pendientes++;
				}
				$card_type = $card->card_type;
				$cardType = CardType::findOrFail($card_type);
				$card->img = $cardType->img;
				if($card->card_type == 1){
					$card->type = 'VISA';
				}
				if($card->card_type == 2){
					$card->type = 'MASTERCARD';
				}
				if($card->card_type == 3){
					$card->type = 'AMERICAN EXPRESS';
				}
				if($card->card_type == 4){
					$card->type = 'DINNERS CLUB';
				}
				if($card->card_type == 5){
					$card->type = 'DISCOVER';
				}
				if($card->card_type == 6){
					$card->type = 'JCB';
				}
				if($card->card_type == 7){
					$card->type = 'UNION PAY';
				}
			}


    	//Enviar JSON
      // return response()->json(['data' => $cardOwner], 200);
			$monto_pendiente = $count_pagos_pendientes * 5;
			return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion Exitosa", 'data'=>$cards, 'monto_pendiente'=> $monto_pendiente]);

    }

    public function edit(Request $request)
    {
			$card_number = $request->get('card_number');
			$cvc = $request->get('cvv');
			list($exp_month, $exp_year) = explode("/", $request->get('due_date'));

			// return response()->json(["data" => $exp_year]);
			// Ingresamos nuestro key generado en https://stripe.com
			// BRUCE
			// \Stripe\Stripe::setApiKey("sk_test_bQYwJHe0YU38m1p8i73t4KzN");
			// PROPIO
			\Stripe\Stripe::setApiKey("sk_test_mtLlCqQqN3rYMVJG7FUfOfoh");
			// PUBLIC KEY PROPIO
			// \Stripe\Stripe::setApiKey("pk_test_pTVgTx51yxGUmfDHuo18i3A0");

			try {

				$response = \Stripe\Token::create(array(
					"card" => array(
						"number"    => $card_number,
						"exp_month" => $exp_month,
						"exp_year"  => $exp_year,
						"cvc"       => $cvc,
						// "name"      => "alfredo yupanqui"
					)));

				$user_id = $request->get('owner_id');
				$patient = Patient::where('users_id', '=' ,$user_id)->get();
				//Obtenemos una tarjeta segun su id y cargamos la nueva infoirmacion
				$card = Card::find($request->get("id"));

				$card->card_number 	= $request->card_number;
				$card->cvv 			= $request->cvv;
				$card->due_date  	= "20".$exp_year."/".$exp_month."/"."01";
				$card->country = $request->country;
				// $card->type_plan    = $request->type_plan;
				// $card->owner_id		= $request->owner_id;
				// $card->owner_id		= $patient[0]->id;
				// $card->type_owner   = $request->type_owner;
				if($response->card->brand == "Visa"){
					$card->card_type    = "1";
				}else if($response->card->brand == "MasterCard"){
					$card->card_type    = "2";
				}else if($response->card->brand == "American Express"){
					$card->card_type    = "3";
				}else if($response->card->brand == "Diners Club"){
					$card->card_type    = "4";
				}else if($response->card->brand == "Discover"){
					$card->card_type    = "5";
				}else if($response->card->brand == "JCB"){
					$card->card_type    = "6";
				}else if($response->card->brand == "UnionPay"){
					$card->card_type    = "7";
				}

				//Guardamos los cambios realizados en la tarjeta
				$data = $card->save();

				return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Actualizacion Exitosa", 'data'=>$card]);
			} catch (\Stripe\Error\Base  $a) {
				return response()->json(['estado'=>false, 'code'=>'400', 'message'=>"Datos de la tarjeta incorrecta", 'data'=>[]]);
			}



    	//Enviar JSON
    	// return response()->json(['data' => $card], 200);

    }

		public function getBrandTargetByPatient(Request $request){
			$users_id = $request->get('patient_id');
			$patient = Patient::where('users_id', '=' ,$users_id)->get();
			$cards = Card::where('owner_id', '=' ,$patient[0]->id)->get();

			$data = array(
				"visa" => "false",
				"mastercard" => "false",
				"american_express" => "false",
				"diners_club" => "false",
				"discover" => "false",
				"jcb" => "false",
				"union_pay" => "false",
			);

			foreach ($cards as $key => $card) {
				if($card->card_type == "1"){
					$data["visa"] = "true";
				}else if($card->card_type == "2"){
					$data["mastercard"] = "true";
				}else if($card->card_type == "3"){
					$data["american_express"] = "true";
				}else if($card->card_type == "4"){
					$data["diners_club"] = "true";
				}else if($card->card_type == "5"){
					$data["discover"] = "true";
				}else if($card->card_type == "6"){
					$data["jcb"] = "true";
				}else if($card->card_type == "7"){
					$data["union_pay"] = "true";
				}
			}
			return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion Exitosa", 'data'=>$data]);

		}

		public function deleteCard(Request $request){
			$card_id = $request->get('card_id');

			$card_deleted = Card::findOrFail($card_id);

			$card_deleted->delete();

			return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Tarjeta eliminada", 'data'=>$card_deleted]);

		}

		public function getCardByBrand(Request $request){
			$brand_id = $request->get('brand_id');
			$users_id = $request->get('users_id');

			$patient = Patient::where('users_id', '=' ,$users_id)->get();
			$cards = Card::where('card_type', '=' ,$brand_id)
										->where('owner_id', '=' ,$patient[0]->id)->get();
			if(count($cards)==0){
				return response()->json(['estado'=>true, 'code'=>'404', 'message'=>"Tarjeta no encontrada", 'data'=>[]]);
			}else{
				return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion exitosa", 'data'=>$cards[0]]);
			}
		}

}

?>
