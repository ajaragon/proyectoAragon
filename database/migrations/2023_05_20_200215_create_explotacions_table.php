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
        Schema::create('explotacions', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();

            $table->string('CIF');
            $table->string('Nombre_Explotacion');
            $table->string('Titular');
            $table->string('Telefono');
            $table->string('Correo_Electronico');
            $table->string('Direccion');
            $table->string('Comarca');
            $table->string('Provincia');
            $table->string('CP');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explotacions');
    }
};
