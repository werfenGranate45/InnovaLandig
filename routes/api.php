<?php

use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecursoController;

Route::post('/login', [AuthController::class, "login"])->name("login");

Route::middleware('auth:sanctum')->group( function (){
    Route::apiResource('/usuario', UsuarioController::class);
    Route::apiResource('/rol', RolController::class);
    Route::apiResource('/recursos', RecursoController::class);
});
