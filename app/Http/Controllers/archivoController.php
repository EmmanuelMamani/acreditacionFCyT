<?php

namespace App\Http\Controllers;

use App\Http\Requests\folderEditRequest;
use App\Http\Requests\folderRequest;
use App\Models\archivo;
use App\Models\indicador;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class archivoController extends Controller
{
    public function reporte_archivos($id){
        $indicador=indicador::find($id);
        $archivos=archivo::where('folder_id',NULL)->where('indicador_id',$id)->get();
        return view('detalle_indicador',['indicador'=>$indicador,'archivos'=>$archivos]);
    }

    
    public function registro_folder(folderRequest $request,$id){
        $folder=new archivo();
        $folder->nombre=$request->nombre_archivo;
        $folder->carrera_id=Auth::user()->carrera_id;
        $folder->indicador_id=$id;
        $folder->tipo='folder';
        $folder->folder_id=$request->folderId==0?null:$request->folderId;
        $folder->save();

        

        return redirect(route('reporte_archivos',['id'=>$id]));

    }
    
    public function registro_archivos(Request $request,$id){
        $archivo=$request->file('document');
        $folder=new archivo;
        $folder->nombre=$archivo->getClientOriginalName();
        $folder->carrera_id=Auth::user()->carrera_id;
        $folder->indicador_id=$id;
        $folder->url=Storage::url($archivo->storeAs('public/files',$folder->nombre)) ;
        $folder->folder_id=$request->folderId==0?null:$request->folderId;
        $folder->tipo='archivo';
        $folder->save();

        
    }

    public function editar_folder(folderEditRequest $request,$id){
     $folder=archivo::find($id);
     $folder->nombre=$request->editNombre;
     $folder->save();

     return redirect(route('reporte_archivos',['id'=>$folder->indicador->id]));
    }

    public function eliminar_folder($id){
        $folder=archivo::find($id);
        $id_indicador=$folder->indicador->id;

        $folder->delete();

        return redirect(route('reporte_archivos',['id'=>$id_indicador]));
    }

    public function eliminar_archivo($id){
        $archivo=archivo::find($id);
        $id_indicador=$archivo->indicador->id;
       

      
        Storage::disk('local')->delete('public/files/'.$archivo->nombre);
        
        $archivo->delete();

        
        return redirect(route('reporte_archivos',['id'=>$id_indicador]));
    }
}
