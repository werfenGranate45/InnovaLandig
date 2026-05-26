<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestAuth;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     public function login(RequestAuth $request){
        $credenciales = $request->only([
            "correo",
            "password"
        ]);
    
        //Si falla la autentificado
        if(!Auth::attempt($credenciales)){
            return response()->json([
                "success" => false,
                "message" => "Correo o password incorrectos",
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken("token")->plainTextToken;

        
        return response()->json([
            "success" => true,
            "mensaje" => "Exito al iniciar sesion",
            "data" => [
                "token" => $token,
                "user" => $user
            ]
        ], 200);   
    }

    public function logout(){
        $this->user()->logout();
    }
}
