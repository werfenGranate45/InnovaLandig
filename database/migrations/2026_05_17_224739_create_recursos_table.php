<?php

use App\Models\CategoriaRecurso;
use App\Models\TipoRecurso;
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
        Schema::create('recursos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Usuario::class)->constrained();
            $table->foreignIdFor(CategoriaRecurso::class)->constrained();
            $table->foreignIdFor(TipoRecurso::class)->constrained();
             $table->string("rutaArchivo")->nullable(false);
            $table->string("titulo", 200)->nullable(false);
            $table->text("descripcion");
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
        Schema::dropIfExists('recursos');
    }
};
