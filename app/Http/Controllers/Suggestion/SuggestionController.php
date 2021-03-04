<?php

namespace App\Http\Controllers\Suggestion;
use App\Suggestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuggestionController extends Controller
{
    // guardar una sugerencia
    public function saveSuggestion(Request $request){
      $fields = $request->all();
      $suggestion = $request->get('suggestion');
      $email = $request->get('email');
      $category_suggestion_id = $request->get('category_suggestion_id');
      if($suggestion == "" || $suggestion == null){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Campo Sugerencia requerido", 'data'=>[]]);

      }else if($email == "" || $email == null){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Campo Email requerido", 'data'=>[]]);

      }else if($category_suggestion_id == "" || $category_suggestion_id == null){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Campo ID categoria requerido", 'data'=>[]]);

      }else{
        $suggestion = Suggestion::create($fields);
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion Exitosa", 'data'=>$suggestion]);

      }
    }

    // obtener sugerencias activas
    public function getSuggestionActive(){
      $suggestions = \DB::table('suggestions')
                    ->where('state', '1')
                    ->get();
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion Exitosa", 'data'=>$suggestions]);

    }

    public function getSuggestionByCategory(Request $request){
      $category_suggestion_id = $request->get('category_suggestion_id');
      if($category_suggestion_id == "" || $category_suggestion_id == null){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Campo ID categoria requerido", 'data'=>[]]);

      }else{
        $suggestion = Suggestion::where("category_suggestion_id", "=", $category_suggestion_id)->get();
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$suggestion]);

      }
    }

    // cambiar el estado de una sugerencia
    public function changeStateSuggestion(Request $request){
      $state = $request->get('state');
      $suggestion_id = $request->get('suggestion_id');
      if($state == "" || $state == null){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Campo state requerido", 'data'=>[]]);

      }else if($state == "" || $state == null){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Campo ID sugerencia requerido", 'data'=>[]]);

      }else{
        $suggestion = Suggestion::findOrFail($suggestion_id);
        $suggestion->state = $state;
        $suggestion_updated = $suggestion->save();
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$suggestion_updated]);

      }
    }
}
