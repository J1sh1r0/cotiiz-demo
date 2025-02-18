<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Solicitud::all(), 200, [], JSON_UNESCAPED_UNICODE);
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
            'proveedor_id' => 'required|exists:proveedores,id',
            'empresa_id' => 'required|exists:empresas,id',
            'servicio_id' => 'required|exists:servicios_tecnicos,id',
            'estado' => 'nullable|string|in:pendiente,aprobado,rechazado'
        ]);

        $solicitud = Solicitud::create($request->all());

        return response()->json($solicitud, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $solicitud = Solicitud::find($id);

        if (!$solicitud) {
            return response()->json(['message' => 'Solicitud no encontrada'], 404);
        }

        return response()->json($solicitud, 200);
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
        $solicitud = Solicitud::find($id);

        if (!$solicitud) {
            return response()->json(['message' => 'Solicitud no encontrada'], 404);
        }

        $request->validate([
            'proveedor_id' => 'sometimes|exists:proveedores,id',
            'empresa_id' => 'sometimes|exists:empresas,id',
            'servicio_id' => 'sometimes|exists:servicios_tecnicos,id',
            'estado' => 'nullable|string|in:pendiente,aprobado,rechazado'
        ]);

        $solicitud->update($request->all());

        return response()->json($solicitud, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $solicitud = Solicitud::find($id);

        if (!$solicitud) {
            return response()->json(['message' => 'Solicitud no encontrada'], 404);
        }

        $solicitud->delete();

        return response()->json(['message' => 'Solicitud eliminada correctamente'], 200);
    }
}
