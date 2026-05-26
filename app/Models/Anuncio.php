<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    public $fillable = [
        "usuario_id",
        "urgencia_anuncio_id",
        "titulo",
        "cuerpo",
        "fechaProgramada",
        "fechaExpiracion",
        "estado"
    ];

    protected $dateFormat = 'dd/mm/YYYY';
    
    public function urgencias(){
        $this->belongsTo(UrgenciaAnuncio::class);
    }
}
