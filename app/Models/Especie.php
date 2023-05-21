<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    use HasFactory;

    //Un animal pertenece a una especie 
    //pero existen varios animales que pertenecen a una sola especie
    public function ganado(){
        return $this->hasMany('App\Models\Ganado');
    }
}
