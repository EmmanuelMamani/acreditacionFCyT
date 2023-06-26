<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    use HasFactory;
    public function usuarios(){
        return $this->hasMany(User::class);
    }
    public function gestiones(){
        return $this->hasMany(gestion::class,'carrera_id');
    }
    public function archivos(){
        return $this->hasMany(archivo::class,'carrera_id');
    }
}
