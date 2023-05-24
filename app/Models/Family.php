<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    //Una especie le pueden pertenecer varios animales
    //Un animal solo puede pertenecer a una especie
    public function animal(){
        //return $this->hasMany('App\Models\animal');
        return $this->hasMany('App\Models\Animal', 'ID_Animal');
    }
}
