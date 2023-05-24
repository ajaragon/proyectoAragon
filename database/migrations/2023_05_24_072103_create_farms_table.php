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
        Schema::create('farms', function (Blueprint $table) {
            $table->id();

            $table->string('CIF');
            $table->string('Nombre_Farm');
            $table->string('Titular');
            $table->string('Telefono');
            $table->string('Correo_Electronico');
            $table->string('Direccion');
            $table->string('Comarca');
            $table->string('Provincia');
            $table->string('CP');

            $table  ->foreignId('DNI')
                    ->constrained('livestock_farmers')
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
        Schema::dropIfExists('farms');
    }
};
