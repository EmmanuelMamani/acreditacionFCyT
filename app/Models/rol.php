<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    use HasFactory;
    public function rol_user(){
        return $this->hasMany(rol_user::class);
    }
    public function permiso_rol(){
        return $this->hasMany(permiso_rol::class);
    }

    public function permisos(){
        return $this->belongsToMany(permiso::class,'permisos_rols');
    }
}
