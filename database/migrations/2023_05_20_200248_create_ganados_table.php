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
        Schema::create('ganados', function (Blueprint $table) {
            $table->engine="InnoDB";
            //$table->id();

            $table->string('ID_ANIMAL');
            $table->string('NUM_Crotal');
            $table->string('L_Engorde');
            $table->string('L_Nacimiento');
            $table->string('F_Nacimiento');
            $table->string('L_Sacrificio');
            $table->string('F_Sacrificio');
            
            //$table->unsignedBigInteger('CIF_Explotacion');  //Campo perteneciente a la tabla explotación
                                                            //Así conocemos en qué ganadería trabaja cada ganadero
            //$table->unsignedBigInteger('ID_Esp_Animal');    //Ocurre lo mismo con el ID de la especie
            //$table->unsignedBigInteger('NUM_Camara');       //y con el número en el que es almacenado
            //Creación de la clave foránea
            //Sintaxis (ESTA SINTAXIS NO FUNCIONA):
                //el campo CIF_Explotacion hace referencia al campo CIF de la tabla explotacions 
            //$table  ->foreign('CIF_Explotacion')
            //        ->references('CIF')
            //        ->on('explotacions')
            //        ->onDelete('cascade');
            /*
            $table  ->foreign('ID_Esp_Animal')
                    ->references('ID_Especie')
                    ->on('especies');
            //        ->onDelete('cascade');
            
            $table  ->foreign('NUM_Camara')
                    ->references('Numero_Camara')
                    ->on('camaras');
            //        ->onDelete('cascade');
            */

            $table  ->foreignId('CIF')              //añadimos a la tabla la clave foránea CIF 
                    ->constrained('explotacions')   //de la tabla explotaciones
                    ->onUpdate('cascade')           //cuando se realice una actualización, será en cascada
                    ->onDelete('cascade');          //cuando se elimine un registro, también se producirá en cascada

            $table  ->foreignId('ID_Especie')
                    ->constrained('especies')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table  ->foreignId('NUM_Camara')
                    ->constrained('camaras')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

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
