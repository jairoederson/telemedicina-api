<?php

namespace App\Http\Controllers;

use App\DoctorChange;
use Illuminate\Http\Request;

class DoctorChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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


        $data = DoctorChange::create($request->all());
        //$data->fill(['fields' => json_encode($request->get('fields'))])->save();
      /*$string = str_replace('\n', '', $data->fields);
      $string = rtrim($string, ',');
      $string = "[" . trim($string) . "]";
      $data->field = json_decode($string, true);*/
        $data->fields = json_decode($data->fields, true);
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DoctorChange  $doctorChange
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorChange $doctorChange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DoctorChange  $doctorChange
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorChange $doctorChange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DoctorChange  $doctorChange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorChange $doctorChange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DoctorChange  $doctorChange
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorChange $doctorChange)
    {
        //
    }
}
