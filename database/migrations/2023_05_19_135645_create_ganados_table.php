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
         /*Campos que tiene la tabla Ganado:
            FECHA DE NACIMIENTO
            FECHA DE SACRIFOCIO
            ?NOMBRE DE LA EXPLOTACIÓN
            ?NOMBRE TITULAR DE LA EXPLOTACIÓN
            NÚMERO DE ID DEL ANIMAL
            NÚMERO DE CROTAL
            LUGAR DE NACIMIENTO
            LUGAR DE ENGORDE
            LUGAR DE SACRIFICIO
            FK- CIF DE LA EXPLOTACION
            FK- CIF DEL MATADERO
        */
        Schema::create('ganados', function (Blueprint $table) {
            $table->id();
            //------------------------------\\
            //Campos:
            $table->string("ID_Animal");
            //$table->string("CIF_Explotacion");  //este es el campo de la foreign key
            //$table->string("CIF_Matadero");     //este es el campo de la foreign key
            //en la siguiente linea se especifica que el campo CIF
            //hace referencia a la clave primaria CIF de la tabla explotacion/matadero
            //y además, le ordenamos al programa que 
            //cuando borre un registro, lo realice en "cascada"
            //$table->foreign("CIF_Explotacion")->references("CIF")->on('explotaciones')->onDelete('set null');   
            //$table->foreign("CIF_Matadero")->references("CIF")->on('mataderos')->onDelete('set null');
            $table->string("NUM_Crotal");
            $table->string("Lugar_Engorde");
            //Soy consciente de que se puede concretar que la entrada de datos del campo Fecha_NAC
            //sea tipo date y no string, como he hecho finalmente. No me la quería jugar.
            $table->string("Fecha_NAC");
            $table->string("Lugar_NAC");
            $table->string("Fecha_SAC");
            $table->string("Lugar_SAC");
            //------------------------------\\
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganados');
    }
};
