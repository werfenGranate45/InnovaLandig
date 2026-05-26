<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaRecurso extends Model
{
    protected $fillable = [
        "nombre"
    ];

    protected function recursos(){
        $this->hasMany(Recurso::class);
    }

    
}
