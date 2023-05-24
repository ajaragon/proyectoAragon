<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slaughter extends Model
{
    use HasFactory;

    //Cada sacrificio se almacena en una cámara
    public function chamber(){
        return $this->belongsTo(Chamber::class, 'chambers');
    }

    //Cada sacrificio es administrado por un empleado
    public function employee(){
        return $this->belongsTo(Employee::class, 'employees');
    }

    //Cada sacrificio es controlado por un veterinario
    public function vet(){
        return $this->belongsTo(Vet::class, 'vets');
    }

    //En un sacrificio pueden intervenir varios matarifes
    public function slaughterer(){
        return $this->belongsToMany('App\Models\Slaughterer', 'slaughter_slaughterers');
    }
}
