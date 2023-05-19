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
            TELEFONO
            CALLE
            LOCALIDAD
            COMARCA
            PROVINCIA
            FK-CIF EXPLOTACION
        */
        Schema::create('ganaderos', function (Blueprint $table) {
            $table->id();
            //------------------------------\\
            //Campos:
            $table->string("DNI");
            //$table->string("CIF_Explotacion");  //este es el campo de la foreign key
            //en la siguiente linea se especifica que el campo CIF
            //hace referencia a la tabla explotacion
            //y además le ordenamos al programa que 
            //cuando borre un registro, lo realice en "cascada"
            //$table->foreign("CIF_Explotacion")->references("CIF")->on('explotaciones')->onDelete('set null'); 
            $table->string("Nombre");
            $table->string("Apellido1");
            $table->string("Apellido2");
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
        Schema::dropIfExists('ganaderos');
    }
};
