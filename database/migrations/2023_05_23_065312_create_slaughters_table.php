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
        Schema::create('slaughters', function (Blueprint $table) {
            $table->id();

            $table->string('COD_Sacrificio');       //PK
            $table->string('Descripcion');
            //$table->string('ID_Veterinario');     //FK                   
            //$table->string('ID_Matarife');        //FK
            //$table->string('ID_Animal');          //FK

            $table  ->foreignId('ID_Veterinario')
                    ->constrained('vets')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
            $table  ->foreignId('ID_Matarife')
                    ->constrained('slaughterers')
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
        Schema::dropIfExists('slaughters');
    }
};
