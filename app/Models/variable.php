<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variable extends Model
{
    use HasFactory;
    public function area(){
        return $this->belongsTo(area::class);
    }
    public function indicadores(){
        return $this->hasMany(indicador::class);
    }
}
