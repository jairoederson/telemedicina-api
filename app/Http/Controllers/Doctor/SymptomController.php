<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mifarma\Repositories\SymptomRepo;
use App\Mifarma\Managers\SpecialtyManager;
use App\Symptom;
use App\Disease;


class SymptomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(SymptomRepo $symptomRepo)
    {
        $this->symptomRepo = $symptomRepo;
    }

    public function getSymptom()
    {
        $symptom = $this->symptomRepo->getSymptom();
        return response()->json(['code'=>200,'estado'=>true,'message'=>"Data Exitoso", 'data'=>$symptom]);
    }

    public function index()
    {
        return view('admin/sintoma');
    }

    public function listarSintoma(Request $request)
    {
        $items = Symptom::join("diseases", "symptom.diseas_id", "=", "diseases.id")
            ->select('symptom.*', 'diseases.name as enfermedad')
            ->where("symptom.estado", "1")
            ->get();
        return response()->json($items);
    }
    
    public function eliminarSintomas(Request $request)
    {
        $symptom = Symptom::find($request['id_sintoma'])->update(['estado' => '0']);
        return response()->json($symptom);
    }
    
    public function registroSintoma()
    {
        return view('admin/registrosintoma');
    }
    
    public function registrarSintoma(Request $request)
    {
        $sintoma = $request['sintoma'];
        $sintoma['estado'] = '1';
        $sintomasave = Symptom::updateOrCreate(['id' => $sintoma['id']], $sintoma);
        return response()->json(true);
    }

    public function listarEnfermedad(Request $request)
    {
        $response = null;
        $response['disease'] = Disease::where("estado", "1")->get();
        return response()->json($response);
    }
    
    public function actualizarSintoma($idsintoma)
    {
        return view('admin/actualizacionsintoma', array("idsintomas" => $idsintoma));
    }

    public function obtenerSintoma(Request $request)
    {
        $response = null;
        $response['sintoma'] = Symptom::where("symptom.id", $request['idsintoma'])->first();

        return response()->json($response);
    }
    
    public function modificarSintoma(Request $request)
    {
        $sintoma = $request['sintoma'];
        $sintoma['estado'] = '1';
        $sintomasave = Symptom::updateOrCreate(['id' => $sintoma['id']], $sintoma);

        return response()->json($sintoma);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
