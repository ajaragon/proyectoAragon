<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creacion de los roles
        $rolAdministrador =Role::create(['name'=>'Administrador']);
        $rolEscritor =Role::create(['name'=>'Escritor']);
        $rolConsultor =Role::create(['name'=>'Consultor']);

        //Creación de permiso crear nuevo registro
        Permission::create(['name'=>'crear'])->syncRoles([$rolAdministrador, $rolAdministrador]);

        //Creación de permiso de editar un usuario
        Permission::create(['name'=>'usuario.edit'])->assignRole($rolAdministrador);
    }
}
