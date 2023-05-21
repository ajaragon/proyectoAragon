<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganado extends Model
{
    use HasFactory;

    //Un animal pertenece a una ganadería
    public function explotacion(){
        return $this->belongsTo('App\Models\Explotacion');
    }

    //Un animal pertenece a una especie
    public function especie(){
        return $this->belongsTo('App\Models\Especie');
    }

    //Un animal es almacenado en una cámara
    public function camara(){
        return $this->belongsTo('App\Models\Camara');
    }
}
