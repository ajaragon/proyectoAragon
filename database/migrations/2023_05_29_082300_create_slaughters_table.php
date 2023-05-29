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

            $table->string('COD_Slaughter');        //PK
            $table->string('Descripcion');
           
            $table  ->foreignId('NUM_Colegiado')
                    ->constrained('vets')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table  ->foreignId('ID_Animal')
                    ->constrained('animals')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table  ->foreignId('ID_Employee')
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
        Schema::dropIfExists('slaughters');
    }
};
