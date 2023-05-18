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
        /*Campos que tiene la tabla Ganadero:
            DNI
            NOMBRE
            APELLIDO 1
            APELLIDO 2
            CALLE
            LOCALIDAD
            COMARCA
            PROVINCIA
            ?NOMBRE DEL NEGOCIO
        */
        Schema::create('ganaderos', function (Blueprint $table) {
            $table->id();
            //------------------------------\\
            //Campos:
            $table->string("DNI");
            $table->string("Nombre");
            $table->string("Apellido1");
            $table->string("Apellido2");
            $table->string("Calle");
            $table->string("Localidad");
            $table->string("Comarca");
            $table->string("Provincia");
            //------------------------------\\
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganaderos');
    }
};
