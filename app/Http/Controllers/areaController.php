<?php

namespace App\Http\Controllers;

use App\Models\area;
use Illuminate\Http\Request;

class areaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reporte_areas()
    {
        $areas=area::where('activo',1)->get();
        return view('reporte_areas',['areas'=>$areas]);
    }

   
    public function registro(Request $request)
    {
        //
    }

    public function editar_area($id)
    {
        
    }

    
    public function eliminar_area($id)
    {
        
    }
}
