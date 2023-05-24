<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('animal_parts', function (Blueprint $table) {
            $table->id();

            $table  ->foreignId('COD_Part')
                    ->constrained('parts')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table  ->foreignId('ID_Animal')
                    ->constrained('animals')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('animal_parts');
    }
};
