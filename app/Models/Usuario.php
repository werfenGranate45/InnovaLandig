<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use  HasFactory, Notifiable, HasApiTokens, SoftDeletes;

    protected $fillable = [
        'idPersonal',
        'nombre',
        'rol_id',
        'apellidoPaterno',
        "apellidoMaterno",
        "correo",
        "password",
        "estatus",
    ];

    protected $hidden = [ 
        "password",
    ];                          

    public function roles(){
        $this->belongsTo(Rol::class);
    }
}
