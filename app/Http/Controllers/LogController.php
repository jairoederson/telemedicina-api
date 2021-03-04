<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class LogController extends Controller
{

    public function index(){
        return view('admin/log');
    }
    
}
