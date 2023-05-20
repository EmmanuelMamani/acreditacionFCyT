<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permiso;

class permisoController extends Controller
{
    //
    public function reporte(){
        $permisos= permiso::all();
        return view('permisos');
    }
}
