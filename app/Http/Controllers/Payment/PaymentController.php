<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\PaymentCompany;
use App\PaymentPatient;
use App\Patient;
use App\Card;

class PaymentController extends Controller
{

		public function generatePaymentCompany(Request $request)

    {

        //Se calcula la informacion de monto total a pagar de la empresa
        $amount = DB::table('queries')->where('patients.company_id', $request->get('company_id'))
            ->leftJoin('patients', 'patients.id', '=', 'queries.patient_id')
            ->sum('queries.price');

	    	// Ingresamos nuestro key generado en https://stripe.com
	      // BRUCE
				// \Stripe\Stripe::setApiKey("sk_test_bQYwJHe0YU38m1p8i73t4KzN");
	      // PROPIO
				// \Stripe\Stripe::setApiKey("sk_test_mtLlCqQqN3rYMVJG7FUfOfoh");
	      // PUBLIC KEY PROPIO
				//\Stripe\Stripe::setApiKey("pk_test_pTVgTx51yxGUmfDHuo18i3A0"); DASC
				\Stripe\Stripe::setApiKey("pk_test_pkTUbx6Fpi9Qd4j7");

				// Se captura el token generado y se crea el pago
				$token = $request->get('stripeToken');
				return $token;
				$carga = \Stripe\Charge::create([
				    'amount' => (int) $amount,
				    'currency' => 'usd',
				    'description' => 'Example charge',
				    'source' => $token,
				]);

	    	//Se instancia el modelo Payment y se cargan los datos
	    	$payment 						= new PaymentCompany;
	    	$payment->card_id 				= $request->card_id;
	    	$payment->company_id 			= $request->company_id;
	    	$payment->stripe_token    		= $request->stripeToken;
	    	$payment->payment_description	= $request->payment_description;
	    	$payment->amount				= $amount;

	    	//Guardamos la informacion de pago
	    	$payment->save();

	    	//Enviar JSON
	    	return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion Exitosa", 'data'=>$payment]);

    }

    public function generatePaymentPatient(Request $request)
    {
				$card_id = $request->get('card_id');
				$card = Card::findOrFail($card_id);
				list($exp_year, $exp_month, $day) = explode("-", $card->due_date);

        // Verificacion si la tarjeta tiene un monto pendiente de pago
				if($card->status == "approved"){
          // verificacion de pagos pendientes
					$user_id = $request->get('patient_id');
					$patient = Patient::where('users_id', '=' ,$user_id)->get();

					$cards = Card::where("owner_id", "=", $patient[0]->id)->get();
					$count_payment_pendient = 0;
					foreach ($cards as $key => $tarjeta) {
						if($tarjeta->status == "denied"){
							$count_payment_pendient++;
						}
					}

          // calculamos el monto total
					$amount = 152 + 152*$count_payment_pendient;

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
								"number"    => $card->card_number,
								"exp_month" => $exp_month,
								"exp_year"  => substr($exp_year, 2, 2),
								"cvc"       => $card->cvv,
							)));

						} catch(\Stripe\Error\Card $e) {
							$card->status = "denied";
							$card->save();
							// Since it's a decline, \Stripe\Error\Card will be caught
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);
						} catch(\Stripe\Error\RateLimit $e){
							$card->status = "denied";
							$card->save();
							// Too many requests made to the API too quickly
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);

						} catch (\Stripe\Error\InvalidRequest $e) {
							$card->status = "denied";
							$card->save();
							// Invalid parameters were supplied to Stripe's API
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);

						} catch (\Stripe\Error\Authentication $e) {
							$card->status = "denied";
							$card->save();
							// Authentication with Stripe's API failed
							// (maybe you changed API keys recently)
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);

						} catch (\Stripe\Error\ApiConnection $e) {
							$card->status = "denied";
							$card->save();
							// Network communication with Stripe failed
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);

						} catch (Exception $e) {
							$card->status = "denied";
							$card->save();
							// Something else happened, completely unrelated to Stripe
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);

						} catch(\Stripe\Error\Base  $e){
							$card->status = "denied";
							$card->save();
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);

						}


						// return $response;
						// Se captura el token generado y se crea el pago
						// $token = $request->get('stripeToken');
						try {
							$carga = \Stripe\Charge::create([
							'amount' => $amount,
							'currency' => 'usd',
							'description' => 'Example charge',
							'source' => $response->id,
							]);
						} catch(\Stripe\Error\Card $e) {
							$card->status = "denied";
							$card->save();
							// Since it's a decline, \Stripe\Error\Card will be caught
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);

						} catch(\Stripe\Error\RateLimit $e){
							$card->status = "denied";
							$card->save();
							// Too many requests made to the API too quickly
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);

						} catch (\Stripe\Error\InvalidRequest $e) {
							$card->status = "denied";
							$card->save();
							// Invalid parameters were supplied to Stripe's API
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);

						} catch (\Stripe\Error\Authentication $e) {
							$card->status = "denied";
							$card->save();
							// Authentication with Stripe's API failed
							// (maybe you changed API keys recently)
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);

						} catch (\Stripe\Error\ApiConnection $e) {
							$card->status = "denied";
							$card->save();
							// Network communication with Stripe failed
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);

						} catch (Exception $e) {
							$card->status = "denied";
							$card->save();
							// Something else happened, completely unrelated to Stripe
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);

						} catch(\Stripe\Error\Base  $e){
							$card->status = "denied";
							$card->save();
              // error
							return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"El pago estara pendiente para la proxima transaccion", 'debt'=>5, 'data'=>$e]);

						}



						// $user_id = $request->get('patient_id');
						// $patient = Patient::where('users_id', '=' ,$user_id)->get();

						//Se instancia el modelo Payment y se cargan los datos
						$payment                        = new PaymentPatient;
						$payment->card_id               = $request->card_id;
						$payment->patient_id            = $patient[0]->id;
						// $payment->patient_id            = $request->patient_id;
						$payment->stripe_token          = $response->id;
						$payment->payment_description   = $request->payment_description;
						$payment->amount                = $amount;



						//Guardamos la informacion de pago
						$payment->save();

						//Actualizamos el status de todas las tarjetas a approved
						$cards = Card::where("owner_id", "=", $patient[0]->id)->get();
						foreach ($cards as $key => $tarjeta) {
							$card_update = Card::findOrFail($tarjeta->id);
							$card_update->status = "approved";
							$card_update->save();
						}

						//Enviar JSON
						return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion Exitosa, la transaccion se realizo con exito.", 'data'=>$payment, 'charge'=>$carga, 'response'=>$response]);

				}else{

					$user_id = $request->get('patient_id');
					$patient = Patient::where('users_id', '=' ,$user_id)->get();

					$cards = Card::where("owner_id", "=", $patient[0]->id)->get();
					$count_payment_pendient = 0;
					foreach ($cards as $key => $tarjeta) {
						if($tarjeta->status == "denied"){
							$count_payment_pendient++;
						}
					}

          // calculamos el monto total
					$amount = 152 + 152*$count_payment_pendient;
					$amount_soles = 5*$count_payment_pendient;
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
								"number"    => $card->card_number,
								"exp_month" => $exp_month,
								"exp_year"  => substr($exp_year, 2, 2),
								"cvc"       => $card->cvv,
							)));

						} catch(\Stripe\Error\Card $e) {
							// Since it's a decline, \Stripe\Error\Card will be caught
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);
						} catch(\Stripe\Error\RateLimit $e){
							// Too many requests made to the API too quickly
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);

						} catch (\Stripe\Error\InvalidRequest $e) {
							// Invalid parameters were supplied to Stripe's API
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);

						} catch (\Stripe\Error\Authentication $e) {
							// Authentication with Stripe's API failed
							// (maybe you changed API keys recently)
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);

						} catch (\Stripe\Error\ApiConnection $e) {
							// Network communication with Stripe failed
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);

						} catch (Exception $e) {
							// Something else happened, completely unrelated to Stripe
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);

						} catch(\Stripe\Error\Base  $e){
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);

						}


						// return $response;
						// Se captura el token generado y se crea el pago
						// $token = $request->get('stripeToken');
						try {
							$carga = \Stripe\Charge::create([
							'amount' => $amount,
							'currency' => 'usd',
							'description' => 'Example charge',
							'source' => $response->id,
							]);
						} catch(\Stripe\Error\Card $e) {
							// Since it's a decline, \Stripe\Error\Card will be caught
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);

						} catch(\Stripe\Error\RateLimit $e){
							// Too many requests made to the API too quickly
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);

						} catch (\Stripe\Error\InvalidRequest $e) {
							// Invalid parameters were supplied to Stripe's API
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);

						} catch (\Stripe\Error\Authentication $e) {
							// Authentication with Stripe's API failed
							// (maybe you changed API keys recently)
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);

						} catch (\Stripe\Error\ApiConnection $e) {
							// Network communication with Stripe failed
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);

						} catch (Exception $e) {
							// Something else happened, completely unrelated to Stripe
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);

						} catch(\Stripe\Error\Base  $e){
              // error
							return response()->json(['estado'=>false, 'code'=>'402', 'message'=>"Pago pendiente del usuario. Intentar con otra tarjeta", 'debt'=>$amount_soles, 'data'=>[] ]);

						}



						// $user_id = $request->get('patient_id');
						// $patient = Patient::where('users_id', '=' ,$user_id)->get();

						//Se instancia el modelo Payment y se cargan los datos
						$payment                        = new PaymentPatient;
						$payment->card_id               = $request->card_id;
						$payment->patient_id            = $patient[0]->id;
						// $payment->patient_id            = $request->patient_id;
						$payment->stripe_token          = $response->id;
						$payment->payment_description   = $request->payment_description;
						$payment->amount                = $amount;



						//Guardamos la informacion de pago
						$payment->save();

						//Actualizamos el status de todas las tarjetas a approved
						$cards = Card::where("owner_id", "=", $patient[0]->id)->get();
						foreach ($cards as $key => $tarjeta) {
							$card_update = Card::findOrFail($tarjeta->id);
							$card_update->status = "approved";
							$card_update->save();
						}

						//Enviar JSON
						return response()->json(['estado'=>true, 'code'=>'202', 'message'=>"Peticion Exitosa, la transaccion se realizo con exito. se realizo el pago de la deuda pendiente", 'data'=>$payment, 'charge'=>$carga, 'response'=>$response]);


				}


    }


}
