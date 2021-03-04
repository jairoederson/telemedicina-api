<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Sentinel;
use App\Query;
use App\User;
use App\Laboratory;
use App\CategoryQuestion;
use Date;
class CategoriaPreguntaController extends Controller
{
   
    public function index(){
        return view('admin/categoria_preguntas');
    }

    public function create(){
        return view('admin/categoria_preguntareg');
    }
    
    public function actualizarCategoria($idcategoria){
        return view('admin/categoria_preguntaact',array("idcategorias"=>$idcategoria));
    }
    
    public function listarCategorias(Request $request){
        $items = CategoryQuestion::select('category_questions.*',
                    DB::raw("CASE state WHEN '1' THEN 'activo' ELSE 'inactivo' END as estado"))
                ->where('state','1')->get();
        
        return response()->json($items);
    }
    
    public function obtenerCategoria(Request $request){
        $response = null;
        $response['categoria'] = CategoryQuestion::where("id",$request['idcategoria'])
                ->first();            
        return response()->json($response);
    }
    
    public function registrarCategoria(Request $request) {
        $category = $request['categoria'];
        $category['state']='1';
              
        CategoryQuestion::updateOrCreate(['id' => $category['id']], $category);
        return response()->json('ok');
    }
    public function eliminarCategoria(Request $request) {
        $categoria = CategoryQuestion::find($request['id'])->update(['state' => '0']);
        return response()->json($categoria);
    }
    
    
}
