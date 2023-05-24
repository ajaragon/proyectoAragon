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
        Schema::create('livestock_farmers', function (Blueprint $table) {
            $table->id();

            $table->string('DNI');
            $table->string('Nombre');
            $table->string('Apellido1');
            $table->string('Apellido2');
            $table->string('Telefono');
            $table->string('Correo_Electronico');
            $table->string('Provincia');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livestock_farmers');
    }
};
