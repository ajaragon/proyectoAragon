<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $permisos =[
            'lectura-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
        ];

        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }//fin del for each
        */
    }
}
