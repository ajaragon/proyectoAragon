<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ejecutar seeder:
        //php artisan db:seed --class SuperAdminSeeder

        //Antes de crear cualquier usuario
        //Crear SuperAmin
        /*
        $usuario =User::create([
            'name'=>'superAdmin',
            'email'=>'superAdmin@superAdmin.com',
            'password'=>bcrypt('12345678') 
        ]);

        $rol =Role::create(['name'=>'administrador']);

        $permisos =Permission::pluck('id', 'id')->all();

        $rol->syncPermissions($permisos);

        $usuario->assignRole([$rol->id]);
        */

        //En caso de que ya exista y no sea la primera vez que se introduce un usuario:
        
        $usuario =User::create([
            'name'=>'superAdmin',
            'email'=>'superAdmin@superAdmin.com',
            'password'=>bcrypt('12345678') 
        ]);

        $usuario->assignRole('administrador');
        
    }
}
