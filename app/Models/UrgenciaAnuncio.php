<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrgenciaAnuncio extends Model
{
    protected $fillable = [
        "nombre",
        "color"
    ];

    public function anuncios(){
        $this->hasMany(Anuncio::class);
    }
}
