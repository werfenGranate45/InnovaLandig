<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $table = "recursos";

    protected $fillable = [
        "usuario_id",
        "categoria_recurso_id",
        "tipo_recurso_id",
        "rutaArchivo",
        "titulo",
        "descripcion",
        "estado"
    ];

    protected $hidden = [
        "rutaArchivo"
    ];

    public function categoria(){
        $this->belongsTo(CategoriaRecurso::class);
    }

    public function tipo(){
        $this->belongsTo(TipoRecurso::class);
    }
}
