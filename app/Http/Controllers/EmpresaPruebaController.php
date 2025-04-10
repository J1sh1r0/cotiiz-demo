<?php

namespace App\Http\Controllers;

use App\Models\SolicitudEmpresaPrueba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaPruebaController extends Controller
{
    // Mostrar lista de solicitudes
    public function dashboard()
    {
        // Asignar empresa_id = 1 por defecto si no está autenticado o no tiene empresa
        $empresaId = auth()->check() && auth()->user()->empresa_id
            ? auth()->user()->empresa_id
            : 1;

        $solicitudes = SolicitudEmpresaPrueba::where('empresa_id', $empresaId)
            ->latest()
            ->get();

        return view('empresaprueba.index', compact('solicitudes'));
    }

    public function ver($id)
    {
        $solicitud = SolicitudEmpresaPrueba::findOrFail($id);
        return view('empresaprueba.solicitudes.ver', compact('solicitud'));
    }

    public function editar($id)
    {
        $solicitud = SolicitudEmpresaPrueba::findOrFail($id);
        return view('empresaprueba.solicitudes.editar', compact('solicitud'));
    }

    public function actualizar(Request $request, $id)
    {
        $solicitud = SolicitudEmpresaPrueba::findOrFail($id);

        $request->validate($this->getValidationRules($solicitud->tipo));

        $solicitud->update($request->all());

        return redirect()->route('empresa_prueba.solicitudes')
            ->with('success', 'Solicitud actualizada correctamente');
    }

    public function eliminar($id)
    {
        $solicitud = SolicitudEmpresaPrueba::findOrFail($id);
        $solicitud->delete();

        return redirect()->route('empresa_prueba.solicitudes')
            ->with('success', 'Solicitud eliminada correctamente');
    }

    public function listarSolicitudes()
    {
        $empresaId = auth()->check() && auth()->user()->empresa_id
            ? auth()->user()->empresa_id
            : 1;

        $solicitudes = SolicitudEmpresaPrueba::where('empresa_id', $empresaId)
            ->latest()
            ->paginate(10);

        return view('empresaprueba.solicitudes.index', compact('solicitudes'));
    }

    // Mostrar formulario de selección de tipo
    public function seleccionarTipo()
    {
        return view('empresaprueba.solicitudes.seleccionar-tipo');
    }

    // Mostrar formulario según tipo seleccionado
    public function crearSolicitud($tipo)
    {
        if (!in_array($tipo, ['producto', 'servicio', 'profesionista'])) {
            abort(404);
        }

        return view('empresaprueba.solicitudes.crear', compact('tipo'));
    }

    // Guardar la solicitud
    public function guardarSolicitud(Request $request, $tipo)
    {
        $request->validate($this->getValidationRules($tipo));

        $data = $request->only([
            'titulo',
            'descripcion',
            'proveedor_id',
            'servicio_id',
            'modelo',
            'nombre',
            'marca',
            'cantidad',
            'presupuesto',
            'link_drive',
            'tipo_solicitudServicio',
            'descripcion_servicio',
            'presupuesto_servicio',
            'trabajo',
            'detalles',
            'conocimientos',
            'cursos',
            'tiempo'
        ]);

        // Asignar valores por defecto si no hay usuario autenticado
        $data['empresa_id'] = auth()->check() && auth()->user()->empresa_id
            ? auth()->user()->empresa_id
            : 1; // Valor por defecto

        $data['user_id'] = auth()->id() ?? 1; // ID de usuario o 1 por defecto
        $data['tipo'] = $tipo;
        $data['estado'] = 'pendiente';

        SolicitudEmpresaPrueba::create($data);

        return redirect()->route('empresa_prueba.solicitudes')
            ->with('success', 'Solicitud creada correctamente');
    }

    // Rellenar con datos de prueba
    public function rellenarDatosPrueba($tipo)
    {
        $datosPrueba = [
            'tipo' => $tipo,
            'titulo' => $this->getTituloPrueba($tipo),
            'descripcion' => $this->getDescripcionPrueba($tipo),
            'estado' => 'pendiente'
        ];

        // Campos específicos por tipo
        switch ($tipo) {
            case 'producto':
                $datosPrueba += [
                    'modelo' => 'X-2000',
                    'nombre' => 'Producto Demo',
                    'marca' => 'Marca Ejemplo',
                    'cantidad' => 5,
                    'presupuesto' => 1500.50,
                    'link_drive' => 'https://drive.google.com/demo'
                ];
                break;

            case 'servicio':
                $datosPrueba += [
                    'tipo_solicitudServicio' => 'Mantenimiento',
                    'descripcion_servicio' => 'Servicio de mantenimiento preventivo',
                    'presupuesto_servicio' => 2000.00,
                    'link_drive' => 'https://drive.google.com/demo'
                ];
                break;

            case 'profesionista':
                $datosPrueba += [
                    'trabajo' => 'Desarrollador Full Stack',
                    'detalles' => 'Para proyecto de 3 meses',
                    'conocimientos' => 'PHP, Laravel, Vue.js',
                    'cursos' => 'Certificación en Laravel',
                    'tiempo' => '3 meses',
                    'link_drive' => 'https://drive.google.com/demo'
                ];
                break;
        }

        return response()->json($datosPrueba);
    }

    protected function getValidationRules($tipo)
    {
        $rules = [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ];

        switch ($tipo) {
            case 'producto':
                $rules += [
                    'modelo' => 'nullable|string|max:100',
                    'nombre' => 'nullable|string|max:100',
                    'marca' => 'nullable|string|max:100',
                    'cantidad' => 'nullable|integer|min:1',
                    'presupuesto' => 'nullable|numeric|min:0',
                    'link_drive' => 'nullable|url'
                ];
                break;

            case 'servicio':
                $rules += [
                    'tipo_solicitudServicio' => 'nullable|string|max:100',
                    'descripcion_servicio' => 'nullable|string',
                    'presupuesto_servicio' => 'nullable|numeric|min:0'
                ];
                break;

            case 'profesionista':
                $rules += [
                    'trabajo' => 'nullable|string|max:100',
                    'detalles' => 'nullable|string',
                    'conocimientos' => 'nullable|string',
                    'cursos' => 'nullable|string',
                    'tiempo' => 'nullable|string|max:50'
                ];
                break;
        }

        return $rules;
    }

    protected function getTituloPrueba($tipo)
    {
        $titulos = [
            'producto' => 'Solicitud de Producto Demo',
            'servicio' => 'Solicitud de Servicio Demo',
            'profesionista' => 'Solicitud de Profesionista Demo'
        ];

        return $titulos[$tipo] ?? 'Solicitud Demo';
    }

    protected function getDescripcionPrueba($tipo)
    {
        $descripciones = [
            'producto' => 'Esta es una solicitud de prueba para productos',
            'servicio' => 'Esta es una solicitud de prueba para servicios',
            'profesionista' => 'Esta es una solicitud de prueba para profesionales'
        ];

        return $descripciones[$tipo] ?? 'Descripción de solicitud demo';
    }
}
