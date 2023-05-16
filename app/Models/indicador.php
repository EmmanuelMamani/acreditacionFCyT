<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\indicador_criterio;
class indicador extends Model
{
    use HasFactory;
    public function variable(){
        return $this->belongsTo(variable::class);
    }

    public function criterios(){
        return $this->hasMany(indicador_criterio::class);
    }
}
