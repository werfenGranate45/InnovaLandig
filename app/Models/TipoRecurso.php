<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoRecurso extends Model
{
    protected $fillable = [
        "nombre"
    ];

    public function recursos(){
        $this->hasMany(Recurso::class);
    }
}
