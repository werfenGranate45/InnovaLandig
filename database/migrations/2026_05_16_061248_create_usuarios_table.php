<?php
use App\Models\Rol;
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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("idPersonal",false, true);
            $table->foreignIdFor(Rol::class)->constrained()->cascadeOnDelete();
            $table->string("nombre",150);
            $table->string("apellidoPaterno",150);
            $table->string("apellidoMaterno",150)->nullable();
            $table->string("correo")->unique();
            $table->string("password");
            $table->boolean("estatus")->default(true)->comment("Estado referenciado a activo o no");
            

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
