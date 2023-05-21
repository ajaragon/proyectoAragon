<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camara extends Model
{
    use HasFactory;

    //Un animal es almacenado en una cámara 
    //a la vez en una cámara pueden ser almacenados varios animales
    public function ganado(){
        return $this->hasMany('App\Models\Ganado');
    }
}
