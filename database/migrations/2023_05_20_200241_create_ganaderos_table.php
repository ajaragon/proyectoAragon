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
        Schema::create('ganaderos', function (Blueprint $table) {
            $table->engine="InnoDB";
            //$table->id();

            $table->string('DNI');
            $table->string('Nombre');
            $table->string('Apellido1');
            $table->string('Apellido2');
            $table->string('Telefono');
            $table->string('Correo_Electronico');
            $table->string('Provincia');
            
            //$table->unsignedBigInteger('CIF_Explotacion');    //Campo perteneciente a la tabla explotación
                                                                //Así conocemos en qué ganadería trabaja cada ganadero
                    
            //Creación de la clave foránea
            //Sintaxis:
                //el campo CIF_Explotacion hace referencia al campo CIF de la tabla explotacions 
            
            
            $table  ->foreignId('CIF')
                    ->constrained('explotacions')
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
        Schema::dropIfExists('ganaderos');
    }
};
