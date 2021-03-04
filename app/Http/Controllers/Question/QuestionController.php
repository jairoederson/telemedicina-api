<?php

namespace App\Http\Controllers\Question;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function saveQuestion(Request $request){
      $title = $request->get('title');
      $categoryId = $request->get('category_id');
      $answer = $request->get('answer');
      $question = $request->get('question');
      $email = $request->get('email');

      if($title == "" || $categoryId == "" || $question == "" || $email == ""){
        return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"Error al enviar campos en request", 'data'=>[]]);
      }else{
        $fields = $request->all();
        $questionSaved = Question::create($fields);
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento exitoso", 'data'=>$questionSaved]);
      }
    }

    public function getQuestions(){
      $questions = Question::all();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion exitosa", 'data'=>$questions]);
    }

    public function getQuestionByCategory(Request $request){
      $category_id = $request->get('category_id');

      $question = Question::findOrFail($category_id);

      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion exitosa", 'data'=>$question]);
    }

    public function getQuestionActived(){
      $questions = \DB::table('questions')
        ->where('state', '1')
        ->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Listado exitoso", 'data'=>$questions]);
    }

    public function stateQuestion(Request $request){
      $state = $request->get('state');
      $question_id = $request->get('question_id');
      $question = Question::findOrFail($question_id);
      $question->state = $state;
      $questionStateUpdate = $question->save();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Paticion exitosa", 'data'=>$questionStateUpdate]);
    }

    public function changeStatusQuestion(Request $request){
      $status = $request->get('status');
      $question_id = $request->get('question_id');
      $question = Question::findOrFail($question_id);
      $question->status = $status;
      $questionStatusUpdate = $question->save();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Paticion exitosa", 'data'=>$questionStatusUpdate]);
    }
}
