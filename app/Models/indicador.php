<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class indicador extends Model
{
    use HasFactory;
    public function variable(){
        return $this->belongsTo(variable::class);
    }
    public function calificaciones(){
        return $this->hasMany(calificacion::class);
    }

    public function criterios(){
        return $this->belongsToMany(criterio::class,'indicador_criterios')->withPivot('activo','id');
    }
}
