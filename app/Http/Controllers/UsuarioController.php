<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class UsuarioController extends Controller
{

    public function index(){
        return view('admin/usuario');
    }
    public function index2(){
        return view('admin/registrousuario');
    }
    
    public function index3(){
        //return view('admin/dropdowns');
        return view('admin/dropzone');
    }


}
