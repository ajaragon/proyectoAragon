<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganadero extends Model
{
    use HasFactory;

    /*
    public function explotacion_R()
    {
        return $this->belongsTo('App\Models\Explotacion');
    }//fin de explotacion_R

    */
    //Un ganadero solo puede trabajar en una ganadería
    public function explotacion(){
        return $this->belongsTo('App\Models\Explotacion');
    }
}
