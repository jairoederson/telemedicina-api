<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mifarma\Repositories\SpecialtyRepo;
use App\Mifarma\Managers\SpecialtyManager;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(SpecialtyRepo $specialtyRepo)
    {
        $this->specialtyRepo = $specialtyRepo;
    }

    public function getSpecialties()
    {
        $specialties = $this->specialtyRepo->getSpecialties();
        return response()->json(['code'=>200,'estado'=>true,'message'=>"Data Exitoso", 'data'=>$specialties]);
    }

    public function postSpecialties(Request $request)
    {
        //return $request->get("data");
        $symptom = $request->input('data');

        $specialties = $this->specialtyRepo->postSpecialties($symptom);
        return response()->json(['code'=>200,'estado'=>true,'message'=>"Data Exitoso", 'data'=>$specialties]);
    }

    public function index()
    {
        //
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
