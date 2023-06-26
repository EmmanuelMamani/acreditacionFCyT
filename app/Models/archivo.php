<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class archivo extends Model
{
    use HasFactory;
    public function indicador(){
        return $this->belongsTo(indicador::class);
    }

    public function folder(){
        return $this->belongsTo(archivo::class);
    }

    public function archivos(){
        return $this->hasMany(archivo::class,'folder_id');
    }

    public function carrera(){
        return $this->belongsTo(carrera::class);
    }

}
