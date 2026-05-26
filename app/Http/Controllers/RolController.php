<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolRequest\StoreRolRequest;
use App\Http\Requests\RolRequest\UpdateRolRequest;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::all();

        return response()->json([
            "success" => true,
            "message" => "Exito en traer los roles",
            "roles" => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRolRequest $request)
    {
        $rolData = $request->only([
            "nombreRol",
            "privilegios",
            "descripcion"
        ]);

        $rol = Rol::create($rolData);

        return response()->json([
            "success" => true,
            "message" => "Exito al crear el rol",
            "rol" => $rol 
        ], 201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol = Rol::findOrFail($id);

        return response()->json([
            "success" => true,
            "message" => "Exito al mostrar el rol",
            "rol" => $rol
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
    public function update(UpdateRolRequest $request, string $id)
    {
        $rol = Rol::findOrFail($id);
       
        $dataRol = $request->all([
            "nombreRol",
            "privilegios",
            "descripcion"
        ]);

        
        $rol->update($dataRol);

        return response()->json([
            "success" => true,
            "message" => "Exito en actualizar rol",
            "rol" => $rol
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Rol::findOrFail($id);

        $rol->delete();

        return response()->json([
            "success" => true,
            "message" => "Exito en eliminar usuario",
            "rol" => $rol
        ]);
    }
}
