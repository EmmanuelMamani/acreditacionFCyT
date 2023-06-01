<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\indicador_criterio;
class indicador extends Model
{
    use HasFactory;
    public function variable(){
        return $this->belongsTo(variable::class);
    }

    public function criterios_indicadores(){
        return $this->hasMany(indicador_criterio::class);
    }
    public function criterios(){
        return $this->belongsToMany(criterio::class,'indicador_criterios')->withPivot('activo','id');
    }

    public function archivos(){
        return $this->hasMany(archivo::class);
    }

    public function calificacion($gestion,$indicador){
        return DB::table('indicador_criterios')
        ->join('calificacions', 'indicador_criterios.id', '=', 'calificacions.indicador_criterio_id')
        ->selectRaw('sum(calificacions.calificacion)/count(*) as promedio')
        ->where('calificacions.gestion_id', '=',$gestion)
        ->where('indicador_criterios.activo','=',1)
       ->where('indicador_criterios.indicador_id','=',$indicador)
        ->get();
    }
}
