<?php

namespace App\Http\Controllers\Suggestion;
use App\CategorySuggestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorySuggestionController extends Controller
{
  // Guardar categoria de sugerencias
  public function saveCategorySuggestion(Request $request){
    $fields = $request->all();
    $category = $request->get('category');
    $description = $request->get('description');
    if($category == "" || $description == ""){
      return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"Error al enviar campos en request", 'data'=>[]]);
    }else{
      $categorySuggestionSaved = CategorySuggestion::create($fields);
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion exitosa", 'data'=>$categorySuggestionSaved]);
    }

  }

  // obtener todas las categorias de sugerencias activas
  public function getCategorySuggestionActive(){
    $categories = \DB::table('category_suggestions')
      ->where('state', '1')
      ->get();
    return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Listado exitoso", 'data'=>$categories]);
  }

  // cambiar el estado de una categoria de sugerencia
  public function changeStateCategorySuggestion(Request $request){
    $state = $request->get('state');
    $category_suggestion_id = $request->get('category_suggestion_id');
    if($state == null || $state == null){
      return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Campo state requerido", 'data'=>[]]);
    }else if($category_suggestion_id == null || $category_suggestion_id == null){
      return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Campo ID de la categoria requerido", 'data'=>[]]);
    }else{
      $category = CategorySuggestion::findOrFail($category_suggestion_id);
      $category->state = $state;
      $categoryUpdated = $category->save();
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$categoryUpdated]);
    }
  }
}
