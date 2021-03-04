<?php

namespace App\Http\Controllers\Question;
use App\Answer;
use App\SubcategoryQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function saveAnswer(Request $request){
      $categoryId = $request->get('category_id');
      $answer = $request->get('answer');
      $question = $request->get('question');

      if($categoryId == "" || $catagoryId == null){
        return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"Error, no se envio el campo categoria ID", 'data'=>[]]);

      }else if($answer == "" || $answer == null){
        return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"Error, no se envio el campo answer", 'data'=>[]]);

      }else if($question == "" || $question == null){
        return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"Error, no se envio el campo question", 'data'=>[]]);

      }else{
        $fields = $request->all();
        $answerSaved = Answer::create($fields);
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento exitoso", 'data'=>$answerSaved]);
      }
    }

    public function getAnswers(){
      $answers = Answer::all();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion exitosa", 'data'=>$answers]);
    }

    public function getAnswersByCategory(Request $request){
      $category_id = $request->get('category_id');

      $answer = Answer::findOrFail($category_id);

      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion exitosa", 'data'=>$answer]);
    }

    public function getAnswersActivated(){
      $answers = \DB::table('answers')
        ->where('state', '1')
        ->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Listado exitoso", 'data'=>$answers]);
    }

    public function stateAnswer(Request $request){
      $state = $request->get('state');
      $answer_id = $request->get('answer_id');
      $answer = Answer::findOrFail($answer_id);
      $answer->state = $state;
      $answerStateUpdate = $answer->save();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Paticion exitosa", 'data'=>$answerStateUpdate]);
    }

    public function relatedAnswer($id){
        $datos = Answer::where('category_id', $id)->limit(5)->get();
        $result = [];
        foreach ($datos as $dato){
            $subcategory = SubcategoryQuestion::find($dato->category_id);
            $dato->category_name = $subcategory->title;
            array_push($result, $dato);
        }

        if ($result){
            if (count($result) < 5){
                $datos2 = Answer::where('category_id', '<>' , $id)
                    ->limit(5)
                    ->get();
                $result2 = [];
                foreach ($datos2 as $dato){
                    $subcategory = SubcategoryQuestion::find($dato->category_id);
                    $dato->category_name = $subcategory->title;
                    array_push($result2, $dato);
                }

                $result = collect($result);
                $result2 = collect($result2);
                $union = $result->union($result2);
                $union->all();

                return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Paticion exitosa", 'data'=>$union]);
            }else{
                return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Paticion exitosa", 'data'=>$result]);
            }
        }else{
            return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Enviar Id Subcategoria de Preguntas", 'data'=>$result]);
        }

    }
}
