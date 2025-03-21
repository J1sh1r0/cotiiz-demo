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
     * Muestra la lista de solicitudes según el perfil.
     */
    public function index()
    {
        $perfil = session('perfil');


        if ($perfil === 'comprador') {
            $solicitudes = Solicitud::all(); // Puedes filtrar aquí según sea necesario
            return view('comprador.solicitudes', compact('solicitudes'));
        } elseif ($perfil === 'proveedor') {
            $solicitudes = Solicitud::all();
            return view('proveedor.solicitudes', compact('solicitudes'));
        }

        return redirect()->route('seleccion.perfil');
    }

    /**
     * Muestra el formulario para crear una solicitud.
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        $empresas = Empresa::all();
        $servicios = ServicioTecnico::all();
        return view('comprador.solicitud_crear', compact('proveedores', 'empresas', 'servicios'));
    }

    /**
     * Guarda una nueva solicitud en la base de datos.
     */
    public function store(Request $request)
    {

        $request->validate([
            'tipo' => 'required|in:producto,servicio,proveedor',
            'titulo' => 'required|string|max:255',
        ]);

        $solicitudData = [
            'tipo' => $request->tipo, // Asegúrate de que este campo está en el formulario
            'titulo' => $request->titulo,
            'estado' => 'pendiente',
            'proveedor_id' => 1,
            'empresa_id' => 1,
            'servicio_id' => 1,
        ];

        // Si es producto, agregar estos campos
        if ($request->tipo === 'producto') {
            $solicitudData = array_merge($solicitudData, [
                'nombre' => $request->nombre,
                'modelo' => $request->modelo,
                'marca' => $request->marca,
                'descripcion'  => $request->descripcion,
                'cantidad' => $request->cantidad,
                'presupuesto' => (float) $request->presupuesto, // Convertir a float para evitar errores
                'link_drive' => $request->link_drive,
            ]);
        }

        // Si es servicio, agregar estos campos
        if ($request->tipo === 'servicio') {
            $solicitudData = array_merge($solicitudData, [
                'tipo_solicitudServicio' => $request->tipo_solicitudServicio,
                'descripcion_servicio' => $request->descripcion_servicio,
                'presupuesto_servicio' => $request->presupuesto_servicio,
                'descripcion'  => $request->descripcion,
            ]);
        }

        // Guardar en la base de datos
        $solicitud = Solicitud::create($solicitudData);


        return redirect()->route(session('perfil') . '.solicitudes')->with('success', 'Solicitud creada correctamente.');
    }


    /**
     * Muestra una solicitud específica.
     */
    public function show($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $user = auth()->user();

        if ($user && $user->empresa_id && $user->proveedor_id) {
            if (session('perfil') === 'comprador' && $solicitud->empresa_id !== $user->empresa_id) {
                return redirect()->route('comprador.solicitudes')->with('error', 'No tienes permiso para ver esta solicitud.');
            }

            if (session('perfil') === 'proveedor' && $solicitud->proveedor_id !== $user->proveedor_id) {
                return redirect()->route('proveedor.solicitudes')->with('error', 'No tienes permiso para ver esta solicitud.');
            }
        }

        return view('comprador.solicitud_ver', compact('solicitud'));
    }

    /**
     * Muestra el formulario para editar una solicitud.
     */
    public function edit(Solicitud $solicitud)
    {
        $proveedores = Proveedor::all();
        $empresas = Empresa::all();
        $servicios = ServicioTecnico::all();

        return view('comprador.solicitud_editar', compact('solicitud', 'proveedores', 'empresas', 'servicios'));
    }

    /**
     * Actualiza la información de una solicitud.
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'estado' => 'required|in:pendiente,aprobado,rechazado'
        ]);

        $solicitud->update($request->all());

        return redirect()->route('comprador.solicitudes')->with('success', 'Solicitud actualizada correctamente.');
    }

    /**
     * Elimina una solicitud de la base de datos.
     */
    public function destroy(Solicitud $solicitud)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route(session('perfil') . '.solicitudes')->with('error', 'Debes estar autenticado para eliminar solicitudes.');
        }

        if (session('perfil') === 'comprador' && $solicitud->empresa_id !== $user->empresa_id) {
            return redirect()->route('comprador.solicitudes')->with('error', 'No tienes permiso para eliminar esta solicitud.');
        }

        if (session('perfil') === 'proveedor' && $solicitud->proveedor_id !== $user->proveedor_id) {
            return redirect()->route('proveedor.solicitudes')->with('error', 'No tienes permiso para eliminar esta solicitud.');
        }

        $solicitud->delete();
        return redirect()->route(session('perfil') . '.solicitudes')->with('success', 'Solicitud eliminada correctamente.');
    }

    /**
     * Elimina una solicitud de la base de datos permanentemente.
     */
    public function destroyPermanent(Solicitud $solicitud)
    {
        $solicitud->forceDelete();
        return redirect()->route(session('perfil') . '.solicitudes')->with('success', 'Solicitud eliminada permanentemente.');
    }

    public function guardar(Request $request)
    {
        // Insertar tres registros con datos predeterminados
        Solicitud::create([
            'proveedor_id' => 1,
            'empresa_id' => 1,
            'servicio_id' => 1,
            'descripcion' => 'Solicitud de tipo Producto',
            'estado' => 'pendiente',
            'titulo' => 'Hola',
        ]);

        Solicitud::create([
            'proveedor_id' => 2,
            'empresa_id' => 2,
            'servicio_id' => 2,
            'descripcion' => 'Solicitud de tipo Servicio',
            'estado' => 'pendiente',
            'titulo' => 'Hola2',
        ]);

        Solicitud::create([
            'proveedor_id' => 2,
            'empresa_id' => 2,
            'servicio_id' => 2,
            'descripcion' => 'Solicitud de tipo Profesional',
            'estado' => 'pendiente',
            'titulo' => 'Hola3',
        ]);

        return redirect()->back()->with('success', 'Solicitudes guardadas correctamente');
    }
}
