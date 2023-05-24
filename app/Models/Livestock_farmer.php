<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestock_farmer extends Model
{
    use HasFactory;

    //Un ganadero pertenece a una explotación agraria
    public function farm()
    {
        //return $this->belongsTo('App\Models\Farm');
        return $this->belongsTo('App\Models\Farm', 'CIF');
    }
}
