<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slaughterer extends Model
{
    use HasFactory;

    //Un matarife puede acudir a varios sacrificios
    public function slaughter(){
        return $this->belongsToMany('App\Models\Slaughter', 'slaughter_slaughterers');
    }
}
