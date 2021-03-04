<?php namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Sentinel;
use App\Query;
use App\User;
use App\Laboratory;
use App\NoteOther;
use Date;
use App\Ubigeo;

use App\File;
use App\Helpers\Thumbnail;
use App\Http\Requests\FileUploadRequest;
class LaboratorioController extends Controller
{
   
    public function index(){
        return view('admin/laboratorios');
    }
    
    public function store($idlaboratorio,FileUploadRequest $request)
    {
        $destinationPath = public_path() . '/images/laboratories/';

        $file_temp = $request->file('file');
        $extension       = $file_temp->getClientOriginalExtension() ?: 'png';
        $safeName        = str_random(10).'.'.$extension;
        //$safeName = $idasociado +1;
        
        $laboratorio = Laboratory::where('id',$idlaboratorio)->first();
        $laboratorio->update(['url_image' => $safeName]);      
        
        $fileItem = new File();
        $fileItem->filename = $safeName;
        //$fileItem->filename = $request->input('idasociado');
        $fileItem->mime = $file_temp->getMimeType();
        $fileItem->save();

        $file_temp->move($destinationPath, $safeName);

        Thumbnail::generate_image_thumbnail($destinationPath . $safeName, $destinationPath . 'thumb_' . $safeName);

        return $fileItem->toJson();
    }
    
    public function actualizarLaboratorio($idlaboratorio){
        return view('admin/laboratoriosract',array("idlaboratorios"=>$idlaboratorio));
    }
    
    public function verLaboratorio($idlaboratorio){
        return view('admin/laboratoriosImagen',array("idlaboratorios"=>$idlaboratorio));
    }
    
    public function listarLaboratorios(Request $request){
        
        
        
        $items = Laboratory::select('laboratories.*',
                    DB::raw("(select concat(name,' ',last_name) from users where users.id = laboratories.users_id) as laboratorista"))
                ->where('estado','1')->get();
        for ($i = 0, $size = count($items); $i < $size; ++$i) {
            $ubigeo = Ubigeo::find($items[$i]['ubigeo_id']);
            //$respuesta['ubigeo'] = $ubigeo;

            $departamentos = Ubigeo::where('estado', '1')->where('provincia', '00')
                    ->where('distrito', '00')->where('departamento', $ubigeo['departamento'])->first()->ubigeo;
            $items[$i]['departamentos'] = $departamentos;

            $provincias = Ubigeo::where('estado', '1')->where('departamento', $ubigeo['departamento'])->where('distrito', '00')
                            ->where('provincia', '<>', '00')->where('provincia',$ubigeo['provincia'])->first()->ubigeo;
            $items[$i]['provincias'] = $provincias;

            $distritos = Ubigeo::where('estado', '1')->where('departamento', $ubigeo['departamento'])->where('distrito', '<>', '00')
                            ->where('provincia', $ubigeo['provincia'])->where('distrito',$ubigeo['distrito'])->first()->ubigeo;
            $items[$i]['distritos'] = $distritos;
        }
         
        
        return response()->json($items);
    }
    
    public function obtenerLaboratorio(Request $request){
        $response = null;
        $response['laboratorio'] = Laboratory::where("id",$request['idlaboratorio'])
                ->first();
        $response['usuario'] = User::where("id",$response['laboratorio']['users_id'])
                ->first(); 
        return response()->json($response);
    }
    
    public function eliminarLaboratorio(Request $request) {
        $laboratorio = Laboratory::find($request['idlaboratorio'])->update(['estado' => '0']);
        return response()->json($laboratorio);
    }
    
    public function listarUsuarios(Request $request){
        $usuarios = User::join('role_users','role_users.user_id','users.id')
                ->select('users.*')
                ->where('estado','1')->where('role_users.role_id',5)->get();
                
                return response()->json($usuarios);
    }
    
    public function registrarLaboratorio(Request $request) {
        $laboratory = $request['laboratorio'];
        $laboratory['estado'] = '1';        
        
        Laboratory::updateOrCreate(['id' => $laboratory['id']], $laboratory);
        return response()->json('ok');
    }
    
}
