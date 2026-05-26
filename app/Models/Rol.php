<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use SoftDeletes, HasFactory;
    
    protected $table = "roles";
    
    protected $fillable = [
        "nombreRol",
        "privilegios",
        "descripcion"
    ];

    protected static function booted()
    {
        static::deleting(function ($rol) {

            $rol->usuarios()->delete();

        });
    }

    //Al trabajr con JSON debemos convertirlo en un cast automatico para trabajar con laravel
    protected $casts = [
        "privilegios" => "array"
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
