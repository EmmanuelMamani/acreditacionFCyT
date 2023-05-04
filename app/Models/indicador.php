<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class indicador extends Model
{
    use HasFactory;
    public function variable(){
        return $this->belongsTo(variable::class);
    }
}
