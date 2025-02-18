<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicioTecnico;

class ServicioTecnicoController extends Controller
{
    /**
     * Muestra la lista de servicios técnicos.
     */
    public function index()
    {
        $servicios = ServicioTecnico::all();
        return view('servicios.index', compact('servicios'));
    }

    /**
     * Muestra el formulario para crear un servicio técnico.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Guarda un nuevo servicio técnico en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
        ]);

        ServicioTecnico::create($request->all());

        return redirect()->route('servicios.index')->with('success', 'Servicio técnico creado exitosamente.');
    }

    /**
     * Muestra un servicio técnico específico (opcional, si necesitas detalles individuales).
     */
    public function show(ServicioTecnico $servicio)
    {
        return view('servicios.show', compact('servicio'));
    }

    /**
     * Muestra el formulario para editar un servicio técnico.
     */
    public function edit(ServicioTecnico $servicio)
    {
        return view('servicios.edit', compact('servicio'));
    }

    /**
     * Actualiza la información de un servicio técnico.
     */
    public function update(Request $request, ServicioTecnico $servicio)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
        ]);

        $servicio->update($request->all());

        return redirect()->route('servicios.index')->with('success', 'Servicio técnico actualizado correctamente.');
    }

    /**
     * Elimina un servicio técnico de la base de datos.
     */
    public function destroy(ServicioTecnico $servicio)
    {
        $servicio->delete();

        return redirect()->route('servicios.index')->with('success', 'Servicio técnico eliminado correctamente.');
    }
}
