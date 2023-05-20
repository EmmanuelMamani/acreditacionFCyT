<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permiso extends Model
{
    use HasFactory;
    public function permiso_rol(){
        return $this->hasMany(permiso_rol::class);
    }
    
}
