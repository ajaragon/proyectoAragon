<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();

            $table->string('ID_Empleado');
            $table->string('DNI');
            $table->string('Nombre');
            $table->string('Apellido1');
            $table->string('Apellido2');
            $table->string('Telefono');
            $table->string('Correo_Electronico');
            $table->string('Direccion');
            $table->string('Provincia');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
