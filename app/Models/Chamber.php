<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chamber extends Model
{
    use HasFactory;
    
    //En una cámara frigorífica se almacenan varias sacrificios
    public function slaughter(){
        return $this->hasMany('App\Models\Slaughter'::class, 'slaughters');
    }
    
}
