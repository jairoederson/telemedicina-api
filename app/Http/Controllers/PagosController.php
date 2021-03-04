<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class PagosController extends Controller
{

    
    
    public function index2(){
        return view('admin/registropagos');
    }
    
    public function index(){
        return view('admin/registropagosempresa');
    }
    public function recetasreg(){
        return view('admin/registrosReceta');
    }
    
    public function asociadoreg(){
        return view('admin/regasociado');
    }
 
 public function verasociado(){
        return view('admin/rverasociado');
    }
public function verpostulante(){
        return view('admin/rverpostulante');
    }

}
