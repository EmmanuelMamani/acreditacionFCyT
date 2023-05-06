<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gestion extends Model
{
    use HasFactory;
    public function carrera(){
        return $this->belongsTo(carrera::class);
    }
    public function calificaciones(){
        return $this->hasMany(calificacion::class);
    }
}
