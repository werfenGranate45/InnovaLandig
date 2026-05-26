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
        Schema::create('urgencia_anuncio', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 100);
            $table->string("color")->comment("etiqueta o color que representa el la urgencia");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urgencia_anuncio');
    }
};
