<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class indicador_criterio extends Model
{
    use HasFactory;

    public function indicador(){
        return $this->belongsTo(indicador::class);
    }

    public function criterio(){
        return $this->belongsTo(criterio::class);
    }
    public function calificaciones(){
        return $this->hasMany(calificacion::class);
    }

}
