<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class AsociadoController extends Controller
{

    public function index(){
        return view('admin/asociados');
    }
    
    public function index2(){
        return view('admin/registroasociado');
    }
 


}
