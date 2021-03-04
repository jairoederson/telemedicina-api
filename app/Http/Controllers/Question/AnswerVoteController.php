<?php

namespace App\Http\Controllers\Question;
use App\AnswerVote;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerVoteController extends Controller
{
  // registrar la valoracion de un voto
    public function saveVoteAnswer(Request $request){
      $fields = $request->all();
      $vote = $request->get('vote');
      $answer_id = $request->get('answer_id');
      $user_id = $request->get('user_id');

      if($vote == "" || $vote == null){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Error, no se envio el campo: Voto", 'data'=>[]]);

      }else if($answer_id == "" || $answer_id == null){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Error, no se envio el campo: ID answer", 'data'=>[]]);

      }else if($user_id == "" || $user_id == null){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Error, no se envio el campo: ID user", 'data'=>[]]);

      }else{
        $voteAnswer = AnswerVote::where("user_id", "=", $user_id)->get();
        // return response()->json($voteAnswer);
        if(count($voteAnswer) == 0){
          $vote = AnswerVote::create($fields);
          return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa, nuevo voto", 'data'=>$vote]);

        }else{
          $votoExiste = false;

          foreach ($voteAnswer as $key => $vote) {
            if($vote->answer_id == $answer_id){
              $votoExiste = true;
            }
          }

          if(!$votoExiste){
            $vote = AnswerVote::create($fields);
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa, nuevo voto", 'data'=>$vote]);

          }else{
            return response()->json(['estado'=>true, 'code'=>'202', 'message'=>"Peticion exitosa, voto realizado", 'data'=>[]]);
          }
        }

      }
    }

    public function getVotesValoration(){
      $votesPositives = AnswerVote::where('vote', "=", "1")->get();
      $votesNegatives = AnswerVote::where('vote', "=", "0")->get();

      return response()->json(['estado'=>true, 'code'=>'202', 'message'=>"Peticion exitosa, voto realizado", 'data'=>["votosPositivos" => count($votesPositives), "votosNegativos" => count($votesNegatives)]]);

    }

}
