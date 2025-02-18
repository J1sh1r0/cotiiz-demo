<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all()); // Muestra los datos recibidos y detiene la ejecución

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:empresas,correo',
            'telefono' => 'nullable|string|max:15',
        ]);
        
        //Empresa::create($validated);

        return redirect()->route('empresas.index')->with('success', 'Empresa creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return response()->json(['message' => 'Empresa no encontrada'], 404);
        }

        return response()->json($empresa, 200);
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
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return response()->json(['message' => 'Empresa no encontrada'], 404);
        }

        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'correo' => 'sometimes|required|email|unique:empresas,correo,' . $id,
            'telefono' => 'nullable|string|max:20',
        ]);

        $empresa->update($request->all());

        return response()->json($empresa, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return response()->json(['message' => 'Empresa no encontrada'], 404);
        }

        $empresa->delete();

        return response()->json(['message' => 'Empresa eliminada correctamente'], 200);
    }
}
