<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explotacion extends Model
{
    use HasFactory;

    //En una explotación ganadera pueden trabajar de uno a varios ganaderos
    //pero un ganadero solo puede pertenecer a una sola explotación
    public function ganadero(){
        return $this->hasMany('App\Models\Ganadero');
    }

    //En una explotación ganadera puede haber de uno a varios animales
    //pero un animal solo pertenece a una sola ganadería
    public function ganado(){
        return $this->hasMany('App\Models\Ganado');
    }
}
