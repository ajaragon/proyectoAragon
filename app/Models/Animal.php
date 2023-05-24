<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory;

    //Un animal pertenece a una explotación
    public function farm()
    {
        return $this->belongsTo('App\Models\Farm', 'CIF');
    }

    //Un animal pertenece a una especie
    public function family()
    {
        return $this->belongsTo('App\Models\Family', 'ID_Especie');
    }

    //Un animal pertenece a un sacrificio
    public function slaughter()
    {
        return $this->hasOne('App\Models\Slaughter', 'COD_Slaughter', 'ID_Animal');
    }

    //De un animal se pueden obtener varias partes
    public function part(){
        return $this->belongsToMany('App\Models\Part', 'animal_parts');
    }

}
