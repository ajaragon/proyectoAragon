<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganado extends Model
{
    use HasFactory;

    /*
    //Un animal solo puede pertenecer a una explotación
    public function explotacion_R()
    {
        return $this->belongsTo('App\Http\Models\Explotacion');
    }//fin de explotacion_R

    public function matadero_R()
    {
        return $this->belongsTo('App\Http\Models\Matadero');
    }//fin de matadero_R
    */
}
