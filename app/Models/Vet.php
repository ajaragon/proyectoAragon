<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vet extends Model
{
    use HasFactory;

    //Un veterinario asiste a varios sacrificios
    public function slaughter(){
        return $this->hasMany('App\Models\Slaughter', 'COD_Slaughter');
    }
}
