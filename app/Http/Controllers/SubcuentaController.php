<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcuenta; // Asegúrate de que el modelo Subcuenta existe

class SubcuentaController extends Controller
{
    /**
     * Muestra la lista de subcuentas disponibles.
     */
    public function index()
    {
        $subcuentas = Subcuenta::all();
        return view('comprador.subcuentas', compact('subcuentas'));
    }


    /**
     * Muestra una subcuenta específica.
     */
    public function show($id)
    {
        $subcuenta = Subcuenta::findOrFail($id);
        return view('comprador.subcuenta_detalle', compact('subcuenta'));
    }

    /**
     * Muestra el formulario para crear una nueva subcuenta.
     */
    public function create()
    {
        return view('comprador.subcuentas_create');
    }

    /**
     * Guarda una nueva subcuenta en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:subcuentas',
            'telefono' => 'nullable|string|max:20',
        ]);

        Subcuenta::create($request->all());

        return redirect()->route('comprador.subcuentas')->with('success', 'Subcuenta creada correctamente.');
    }

    /**
     * Muestra el formulario para editar una subcuenta existente.
     */
    public function edit($id)
    {
        $subcuenta = Subcuenta::findOrFail($id);
        return view('comprador.subcuentas_edit', compact('subcuenta'));
    }

    /**
     * Actualiza una subcuenta en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:subcuentas,correo,' . $id,
            'telefono' => 'nullable|string|max:20',
        ]);

        $subcuenta = Subcuenta::findOrFail($id);
        $subcuenta->update($request->all());

        return redirect()->route('comprador.subcuentas')->with('success', 'Subcuenta actualizada correctamente.');
    }

    /**
     * Elimina una subcuenta de la base de datos.
     */
    public function destroy($id)
    {
        $subcuenta = Subcuenta::findOrFail($id);
        $subcuenta->delete();

        return redirect()->route('comprador.subcuentas')->with('success', 'Subcuenta eliminada correctamente.');
    }
}
