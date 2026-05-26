<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecursoRequest\StoreRecursoRequest;
use App\Http\Requests\RecursoRequest\UpdateRecursoRequest;
use App\Models\Recurso;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreRecursoRequest $request)
    {
        $dataRecurso = $request->only([
            "usuario_id",
            "categoria_recurso_id",
            "tipo_recurso_id",
            "rutaArchivo",
            "titulo",
            "descripcion",
            "estado"
        ]);

        $recurso = Recurso::create($dataRecurso);

        return response()->json([
            "success" => true,
            "message" => "Exito en crear el recurso",
            "recurso" => $recurso
        ], 201);    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recurso = Recurso::findOrFail($id);

        return response()->json([
            "success" => true,
            "message" => "Exito en mostrar el usuario",
            "recurso" => $recurso
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
    public function update(UpdateRecursoRequest $request, string $id)
    {
        $dataUpdate = $request->only([
            "usuario_id",
            "categoria_recurso_id",
            "tipo_recurso_id",
            "rutaArchivo",
            "titulo",
            "descripcion",
            "estado"
        ]);

        $recursoActualizar = Recurso::findOrFail($id);

        $recursoActualizar->update($dataUpdate);

        return response()->json([
            "success" => true,
            "message" => "Exito en modificar el usuario",
            "recurso" => $recursoActualizar 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recurso = Recurso::findOrFail($id);

        $recurso->delete();

        return response()->json([
            "success" => true,
            "message" => "Exito en borrar el recurso",
            "recurso" => $recurso
        ]);
    }
}
