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

    public function evaluadores(){
        return $this->hasMany(evaluadore::class);
    }

    public function crearEvaluadores(){
        $times = 1;
        if ($this->tipo_evaluacion=="COMPUESTO") {
            $times = 2;
        }

        $assessments = Collection::times($times, function () {
            return new evaluadore();
        });

        $this->evaluadores()->saveMany($assessments);
    }
}
