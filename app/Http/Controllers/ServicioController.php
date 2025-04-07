<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return view('Servicio.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,bmp,tiff|max:2048',
        ]);

        // Crear un nuevo servicio
        $servicio = new Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->precio = $request->precio;
        $servicio->descripcion = $request->descripcion;

        // Establecer el estatus y la foto
        $servicio->estatus = 'Pendiente'; // O el estatus que desees
        if ($request->hasFile('foto')) {
            $servicio->foto = $request->file('foto')->store('servicios', 'public');
        }

        // Guardar el servicio
        $servicio->save();

        return redirect()->route('Servicio.index')->with('success', 'Servicio creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('Servicio.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('Servicio.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $servicio = Servicio::findOrFail($id);

    // Validar los datos recibidos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'descripcion' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,bmp,tiff|max:2048',
    ]);

    $servicio->nombre = $request->nombre;
    $servicio->precio = $request->precio;
    $servicio->descripcion = $request->descripcion;

    // Si se sube una nueva imagen, eliminamos la anterior
    if ($request->hasFile('foto')) {
        if ($servicio->foto && \Storage::disk('public')->exists($servicio->foto)) {
            \Storage::disk('public')->delete($servicio->foto);
        }

        $servicio->foto = $request->file('foto')->store('servicios', 'public');
    }

    $servicio->save();

    return redirect()->route('Servicio.index')->with('success', 'Servicio actualizado con éxito');
}

public function eliminarFoto($id)
{
    $servicio = Servicio::findOrFail($id);

    if ($servicio->foto && \Storage::disk('public')->exists($servicio->foto)) {
        \Storage::disk('public')->delete($servicio->foto);
        $servicio->foto = null;
        $servicio->save();
    }

    return redirect()->back()->with('success', 'Imagen eliminada correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();

        return redirect()->route('Servicio.index')->with('success', 'Servicio eliminado con éxito');
    }
}
