<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    //Un empleado administra varios sacrificio
    public function slaughter(){
        return $this->hasMany('App\Models\Slaughter', 'slaughters');
    }
}
