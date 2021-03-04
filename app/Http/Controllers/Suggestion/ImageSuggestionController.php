<?php

namespace App\Http\Controllers\Suggestion;
use App\ImageSuggestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageSuggestionController extends Controller
{
    // guardar imagen de sugerencias
    public function saveImageSuggestion(Request $request){
      $fields = $request->all();
      $image = $request->get('image');
      $suggestion_id = $request->get('suggestion_id');
      if($image == "" || $image == null){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Campo Imagen requerido", 'data'=>[]]);

      }else if($suggestion_id == "" || $suggestion_id == null){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Campo ID sugerencia requerido", 'data'=>[]]);

      }else{
        $imageSuggestion = ImageSuggestion::create($fields);
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion Exitosa", 'data'=>$imageSuggestion]);

      }
    }

    // obtener imagenes de sugerencia activas
    public function getImageSuggestionActive(){
      $imageSuggestion = \DB::table('image_suggestions')
      ->where('state', '1')
      ->get();
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion Exitosa", 'data'=>$imageSuggestion]);

    }

    // ObtenerImagenes por sugerencia
    public function getImageBySuggestion(Request $request){
      $suggestion_id = $request->get('suggestion_id');
      if($suggestion_id == "" || $suggestion_id == null){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Campo ID sugerencia requerido", 'data'=>[]]);

      }else {
        $imageSuggestions = ImageSuggestion::where('suggestion_id', '=', $suggestion_id)->get();
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion Exitosa", 'data'=>$imageSuggestions]);

      }
    }

    // cambiar el estado de una imagen de sugerencia
    public function changeStateImageSuggestion(Request $request){
      $state = $request->get('state');
      $image_suggestion_id = $request->get('image_suggestion_id');
      if($state == null || $state == ""){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Campo state requerido", 'data'=>[]]);

      }else if($image_suggestion_id == null || $image_suggestion_id == ""){
        return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"Campo ID sugerencia requerido", 'data'=>[]]);

      }else{
        $imageSuggestion = ImageSuggestion::findOrFail($image_suggestion_id);

        $imageSuggestion->state = $state;
        $imageSuggestionUpdated = $imageSuggestion->save();
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion Exitosa", 'data'=>$imageSuggestionUpdated]);

      }
    }
}
