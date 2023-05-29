<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        //https://www.youtube.com/watch?v=3c_Ri_h0ecY

        //Creación de los roles:
        //  -administrador
        //  -editor
        //  -consultor

        $rolAdministrador =Role::create(['name'=>'administrador']);
        $rolEscritor =Role::create(['name'=>'escritor']);
        $rolConsultor =Role::create(['name'=>'consultor']);

        //Encuentra a un usuario para asignarle un rol
        $user = User::find(1);


        //Le asigna un rol
        $user->assignRole($rolAdministrador);
        $user->assignRole($rolEscritor);
        $user->assignRole($rolConsultor);
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
