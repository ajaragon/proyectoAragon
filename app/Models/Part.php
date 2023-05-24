<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    //Una pieza la pueden tener varios animales
    public function animal(){
        return $this->belongsToMany('App\Models\AnimalPart', 'animal_parts');
    }
}
