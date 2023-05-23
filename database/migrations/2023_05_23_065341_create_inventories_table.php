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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();

            $table->string('COD_Inventario');       //PK
            //$table->string('COD_Pieza');          //FK
            //$table->string('NUM_Camara');         //FK
            //$table->string('COD_Sacrificio');     //FK    
            //$table->string('ID_Empleado');        //FK

            //Se agrega las relaciones con las otras tablas como van a aparecer en PHPMyAdmin
                //campo de la otra tabla se añade
                //tabla de la que coge el campo
                //actualización en cascada
                //borrar en cascada
            $table  ->foreignId('COD_Pieza')
                    ->constrained('parts')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
            $table  ->foreignId('NUM_Camara')
                    ->constrained('chambers')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table  ->foreignId('COD_Sacrificio')
                    ->constrained('slaughters')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
            $table  ->foreignId('ID_Empleado')
                    ->constrained('employees')
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
        Schema::dropIfExists('inventories');
    }
};
