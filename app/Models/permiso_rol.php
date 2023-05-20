<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permiso_rol extends Model
{
    use HasFactory;
    public function permiso(){
        return $this->belongsTo(permiso::class);
    }
    public function rol(){
        return $this->belongsTo(rol::class);
    }
}
