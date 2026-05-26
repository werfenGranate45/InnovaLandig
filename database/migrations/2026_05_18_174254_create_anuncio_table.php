<?php

use App\Models\UrgenciaAnuncio;
use App\Models\Usuario;
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
        Schema::create('anuncio', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Usuario::class)->constrained();
            $table->foreignIdFor(UrgenciaAnuncio::class)->constrained();
            $table->string("titulo")->nullable(false);
            $table->text("cuerpo");
            $table->dateTime("fechaProgramada")->nullable()->comment("Fecha que mostrara el anuncio");
            $table->dateTime("fechaExpiracion")->nullable()->comment("Fecha de expiración que no se muestre");
            $table->boolean("estado")->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncio');
    }
};
