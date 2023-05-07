<?php

namespace App\Http\Controllers;

use App\Models\variable;
use Illuminate\Http\Request;

class variableController extends Controller
{
    
    public function reporte_variables($id)
    {
        $variables=variable::where('activo',1)->where('area_id',$id);
        return view('detalle_area');
    }

    public function registro(Request $request)
    {
        
    }

    public function editar_variable($id)
    {
        //
    }

    
    public function eliminar_indiicador($id)
    {
        //
    }

}
