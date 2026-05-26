<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest\UpdateUsuarioRequest;
use App\Http\Requests\UsuarioRequest\StoreUsuarioRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();

        return response()->json([
            "success" => true,
            "message" => "Exito en traer todos los usuarios",
            "usuarios" => $usuarios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $dataUser = $request->only([
            "idPersonal",
            "nombre",
            "apellidoPaterno",
            "apellidoMaterno",
            "correo",
            "password",
            "rol_id"
        ]);

        $dataUser['password'] = Hash::make($dataUser['password']);

        $usuario = Usuario::create($dataUser);

        return response()->json([
            "success" => true,
            "message" => "Exito en crear el usuario",
            "usuario" => $usuario
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::findOrFail($id);

        return response()->json([
            "success" => true,
            "message" => "Exito en encontrar al usuario",
            "usuario" => $usuario
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, string $id)
    {
        $dataUser = $request->only([
            "idPersonal",
            "nombre",
            "apellidoPaterno",
            "apellidoMaterno",
            "correo",
            "password",
            "rol_id"
        ]);

        $usuario = Usuario::findOrFail($id);

        $usuario->update($dataUser);

        return response()->json([
            "success" => true,
            "message" => "Exito en actualizar el usuario",
            "usuario" => $usuario
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::find($id);

        $usuario->delete();
    
        return response()->json([
            'message' => 'Usuario eliminado correctamente'
        ], 200);
    }
}
