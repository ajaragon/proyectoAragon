<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;
    
    public function livestock_Farmer(){
        return $this->hasMany('App\Models\Livestock_farmer'::class, 'DNI');
    }

    public function animal(){
        return $this->hasMany('App\Models\Animal', 'ID_Animal');
    }
}
