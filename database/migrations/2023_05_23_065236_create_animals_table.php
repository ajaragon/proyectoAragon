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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();

            $table->string('ID_Animal');
            $table->string('NUM_Crotal');
            $table->string('L_Engorde');
            $table->string('L_Nacimiento');
            $table->string('F_Nacimiento');
            $table->string('L_Sacrificio');
            $table->string('F_Sacrificio');
            //$table->string('ID_Matarife');
            //$table->string('ID_Especie');

            $table  ->foreignId('ID_Matarife')
                    ->constrained('slaughterers')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
            $table  ->foreignId('ID_Especie')
                    ->constrained('families')
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
        Schema::dropIfExists('animals');
    }
};
