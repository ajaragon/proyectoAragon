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
         /*Campos que tiene la tabla Explotación:
            CIF
            NOMBRE DE LA EXPLOTACIÓN
            TELEFONO
            CALLE
            LOCALIDAD
            COMARCA
            PROVINCIA
        */
        Schema::create('explotaciones', function (Blueprint $table) {
            $table->id();
            //------------------------------\\
            //Campos:
            $table->string("CIF");
            $table->string("NOM_Explotacion");
            $table->string("Telefono");
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
        Schema::dropIfExists('explotaciones');
    }
};
