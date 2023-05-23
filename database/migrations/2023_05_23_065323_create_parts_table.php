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
        Schema::create('parts', function (Blueprint $table) {
            $table->id();

            $table->string('COD_Pieza');            //PK
            $table->string('Descripcion');      
            //$table->string('NUM_Camara');         //FK
            //$table->string('COD_Sacrificio');     //FK
            //$table->string('ID_Animal');          //FK

            $table  ->foreignId('NUM_Camara')
                    ->constrained('chambers')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table  ->foreignId('COD_Sacrificio')
                    ->constrained('slaughters')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
            $table  ->foreignId('ID_Animal')
                    ->constrained('animals')
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
        Schema::dropIfExists('parts');
    }
};
