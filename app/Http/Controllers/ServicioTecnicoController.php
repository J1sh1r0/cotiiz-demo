<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicioTecnico;

class ServicioTecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(ServicioTecnico::all(), 200);
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
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $servicio = ServicioTecnico::create($request->all());

        return response()->json($servicio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $servicio = ServicioTecnico::find($id);

        if (!$servicio) {
            return response()->json(['message' => 'Servicio técnico no encontrado'], 404);
        }

        return response()->json($servicio, 200);
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
    public function update(Request $request, $id)
    {
        $servicio = ServicioTecnico::find($id);

        if (!$servicio) {
            return response()->json(['message' => 'Servicio técnico no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $servicio->update($request->all());

        return response()->json($servicio, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $servicio = ServicioTecnico::find($id);

        if (!$servicio) {
            return response()->json(['message' => 'Servicio técnico no encontrado'], 404);
        }

        $servicio->delete();

        return response()->json(['message' => 'Servicio técnico eliminado correctamente'], 200);
    }
}
