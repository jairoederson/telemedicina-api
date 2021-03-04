<?php namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Sentinel;
use App\Query;
use App\User;
use App\Answer;
use App\CategoryQuestion;
use Date;
class PreguntaController extends Controller
{
   
    public function index(){
        return view('admin/preguntas');
    }
    
    
    public function actualizarPregunta($idpregunta){
        return view('admin/preguntaact',array("idpreguntas"=>$idpregunta));
    }
    
    public function listarPreguntas(Request $request){
        $items = Answer::join("category_questions","category_questions.id", "=" ,"answers.category_id")->select('answers.*',
                    DB::raw("CASE answers.state WHEN '1' THEN 'activo' ELSE 'inactivo' END as estado"),
                DB::raw("title as categoria"),
                DB::raw("CASE question_frequency WHEN '1' THEN 'Si' ELSE 'No' END as frecuencia"))
                ->where('answers.state','1')->get();
        
        return response()->json($items);
    }
    
    public function obtenerPregunta(Request $request){
        $response = null;
        $response['pregunta'] = Answer::where("id",$request['idpregunta'])
                ->first();            
        return response()->json($response);
    }
    
    public function registrarPregunta(Request $request) {
        $pregunta = $request['pregunta'];
        $pregunta['state']='1';      
        Answer::updateOrCreate(['id' => $pregunta['id']], $pregunta);
        return response()->json('ok');
    }
    
    public function eliminarPregunta(Request $request) {
        $pregunta = Answer::find($request['id'])->update(['state' => '0']);
        return response()->json($pregunta);
    }
    
    
}
