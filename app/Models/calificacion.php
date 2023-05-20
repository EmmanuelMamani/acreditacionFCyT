<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calificacion extends Model
{
    use HasFactory;
    public function gestion(){
        return $this->belongsTo(gestion::class);
    }
    public function inidicador_criterio(){
        return $this->belongsTo(inidicador_criterio::class);
    }
}
