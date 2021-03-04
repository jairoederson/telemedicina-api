<?php

namespace App\Http\Controllers\Question;

use App\CategoryQuestion;
use App\Answer;
use App\SubcategoryQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryQuestionController extends Controller
{
    public function saveCategoryQuestion(Request $request){
      $title = $request->get('title');
      $description = $request->get('description');
      if($title == "" || $description == ""){
        return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"Error al enviar campos en request", 'data'=>[]]);
      }else{
        $fields = $request->all();
        $categorySaved = CategoryQuestion::create($fields);
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento exitoso", 'data'=>$categorySaved]);
      }
    }

    public function getCategoryQuestions(){
      $categories = CategoryQuestion::all();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Listado exitoso", 'data'=>$categories]);
    }

    public function getCategoryActivated(){
      $categories = \DB::table('category_questions')
        ->where('state', '1')
        ->get();
      foreach ($categories as $key => $category) {
        // $answers = Answer::find($category->id);
        $answers = Answer::where('category_id', '=', $category->id)->get();
        // return response()->json($answers);
        $category->answers = count($answers);
      }

      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Listado exitoso", 'data'=>$categories]);
    }

    public function stateCategory(Request $request){
      $state = $request->get('state');
      $category_id = $request->get('category_id');
      $category = CategoryQuestion::findOrFail($category_id);
      $category->state = $state;
      $categoryStateUpdate = $category->save();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Paticion exitosa", 'data'=>$categoryStateUpdate]);
    }


    public function getDataAtencionCliente(){

      $categories = CategoryQuestion::where('state', 1)->get();
      $preguntas_frecuentes = [];
      foreach ($categories as $key => $category) {
        $answers = Answer::where('category_id', '=', $category->id)
        ->where('state', '=', 1)->get();
        $category->questions = $answers;
        foreach ($answers as $key => $answer) {

          $category_name = CategoryQuestion::find($answer->category_id);
          $answer->category_name = $category_name->title;
          $answer->category_description = $category_name->description;
          if($answer->question_frequency == "1"){
            $answer->url = "https://www.alo.doctor/mobile/paciente/dist/#/help/1/detail";
            array_push($preguntas_frecuentes, $answer);
          }
        }
      }
      // return response()->json(array("preguntasFrecuentes"=>$preguntas_frecuentes));
      // array_push($categories, array("preguntas frecuentes"=>$preguntas_frecuentes));

      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Paticion exitosa", 'data'=>["preguntasFrecuentes"=>$preguntas_frecuentes, "preguntas"=>$categories]]);

    }

    public function getDataCategory($id){
      $category = CategoryQuestion::findOrFail($id);
      $answers = Answer::where('category_id', '=', $id)->get();
      $category->answers = $answers;
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Paticion exitosa", 'data'=>$category]);

    }

    public function getCategorySubcategories(){
        $categories = CategoryQuestion::where('state', 1)->get();
        $result = [];
        foreach ($categories as $category){
            $subcategories = SubcategoryQuestion::where('category_id', $category->id)->get();
            $result[] = [
                'category_id' => $category->id,
                'category_name' => $category->title,
                'category_description' => $category->description,
                'url' => $category->url,
                'subcategories' => $subcategories
            ];
        }
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Paticion exitosa", 'data'=>$result]);
    }

    public function getCategorySubcategory($id){

        $categories = CategoryQuestion::findOrFail($id);
        $subcategories = SubcategoryQuestion::where('category_id', $categories->id)->get();

        //$result = [];
        $subcategorias = [];
        foreach ($subcategories as $subcategory){
            $answers = Answer::where('category_id', $subcategory->id)->get();
            $subcategorias[] = [
                'subcategory_name' => $subcategory->title,
                'subcategory_description' => $subcategory->title,
                'answers' => $answers
            ];
        }
        $result = [
            'category_name' => $categories->title,
            'category_description' => $categories->description,
            'url' => $categories->url,
            'subcategories' => $subcategorias
        ];

        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Paticion exitosa", 'data'=>$result]);
    }

}
