<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class CompanyController extends Controller
{
	public function getCompanies()
    {
    	$companies = Company::all();
        // return response()->json(['data' => $companies], 200);
				return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion Exitosa", 'data'=>$companies]);

    }


    public function create(Request $request)
    {
    	$company 				= new Company;
    	$company->name 	= $request->name;
    	$company->ruc 			= $request->ruc;
    	$company->number_phone  	= $request->number_phone;
    	$company->address    = $request->address;
    	$company->location		= $request->location;
    	$company->about   = $request->about;
    	$company->save();

    	// return response()->json(['data' => $company], 200);
			return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento Exitoso", 'data'=>$company]);

    }

    public function get($id)
    {

    	$company = Company::find($id);
    	// return response()->json(['data' => $company], 200);
			return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Peticion Exitosa", 'data'=>$company]);

    }


    public function edit(Request $request)
    {

    	$company = Company::find($request->get("id"));
    	$company->name 	= $request->name;
    	$company->ruc 			= $request->ruc;
    	$company->number_phone  	= $request->number_phone;
    	$company->address    = $request->address;
    	$company->location		= $request->location;
    	$company->about   = $request->about;
    	$company->save();

    	$company->save();

    	// return response()->json(['data' => $company], 200);
			return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Actualizacion Exitosa", 'data'=>$company]);

    }

}
