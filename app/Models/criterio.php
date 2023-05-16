<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class criterio extends Model
{
    use HasFactory;
    public function indicadores(){
        return $this->belongsToMany(indicador::class,'indicador_criterios')->withPivot('activo','id');
    }
}
