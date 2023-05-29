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
        Schema::create('slaugther_slaughterers', function (Blueprint $table) {
            $table->id();

            $table  ->foreignId('DNI')
                    ->constrained('slaughterers')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table  ->foreignId('COD_Slaughter')
                    ->constrained('slaughters')
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
        Schema::dropIfExists('slaugther_slaughterers');
    }
};
