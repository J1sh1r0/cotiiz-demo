<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Proveedor;
use App\Models\Empresa;
use App\Models\ServicioTecnico;

class SolicitudController extends Controller
{
    /**
     * Muestra la lista de solicitudes.
     */
    public function index()
    {
        //$solicitudes = Solicitud::with(['proveedor', 'empresa', 'servicio'])->get();
        $solicitudes = Solicitud::with(['proveedor', 'empresa', 'servicio'])->whereNull('deleted_at')->get();
        return view('solicitudes.index', compact('solicitudes'));
    }


    /**
     * Muestra el formulario para crear una solicitud.
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        $empresas = Empresa::all();
        $servicios = ServicioTecnico::all();
        return view('solicitudes.create', compact('proveedores', 'empresas', 'servicios'));
    }

    /**
     * Guarda una nueva solicitud en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'empresa_id' => 'required|exists:empresas,id',
            'servicio_id' => 'required|exists:servicios_tecnicos,id',
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|in:pendiente,aprobado,rechazado'
        ]);

        Solicitud::create($request->all());

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada correctamente.');
    }


    /**
     * Muestra una solicitud específica (opcional, si necesitas detalles individuales).
     */
    public function show(Solicitud $solicitud)
    {
        return view('solicitudes.show', compact('solicitud'));
    }

    /**
     * Muestra el formulario para editar una solicitud.
     */
    public function edit(Solicitud $solicitud)
    {
        $proveedores = Proveedor::all();
        $empresas = Empresa::all();
        $servicios = ServicioTecnico::all();
        return view('solicitudes.edit', compact('solicitud', 'proveedores', 'empresas', 'servicios'));
    }



    /**
     * Actualiza la información de una solicitud.
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'empresa_id' => 'required|exists:empresas,id',
            'servicio_id' => 'required|exists:servicios_tecnicos,id',
            'estado' => 'required|string|max:50',
        ]);

        $solicitud->update($request->all());

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada correctamente.');
    }



    /**
     * Elimina una solicitud de la base de datos.
     */
    public function destroy(Solicitud $solicitud)
    {
        //dd($solicitud->id); // Esto mostrará el ID que Laravel está recibiendo

        $solicitud->delete(); // Usa eliminación lógica con SoftDeletes
        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada correctamente.');
    }

    /**
     * Elimina una solicitud de la base de datos permanentemente.
     */
    public function destroyPermanent(Solicitud $solicitud)
    {
        $solicitud->forceDelete(); // Borra de la base de datos permanentemente
        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada permanentemente.');
    }
}
