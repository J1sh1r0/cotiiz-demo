<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesional;
use Illuminate\Support\Facades\Storage;

class ProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesionales = Profesional::all();
        return view('professional.index', compact('profesionales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professional.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'primer_nombre' => 'required|string|max:255',
        'segundo_nombre' => 'nullable|string|max:255',
        'primer_apellido' => 'required|string|max:255',
        'segundo_apellido' => 'nullable|string|max:255',
        'profesion' => 'required|string|max:255',
        'especialidad' => 'nullable|string|max:255',
        'telefono' => 'required|string|max:20',
        'correo' => 'required|email|max:255|unique:profesionales,correo',
        'pais' => 'required|string|max:100',
        'estado' => 'required|string|max:100',
        'ciudad' => 'required|string|max:100',
        'direccion' => 'required|string|max:255',
        'codigo_postal' => 'required|string|max:10',
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'instagram' => 'nullable|url',
        'linkedin' => 'nullable|url',
        'cv' => 'nullable|file|mimes:pdf|max:2048',
        'titulo_1' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'titulo_2' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'ine_1' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'ine_2' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Inicializar los datos del formulario
    $data = $request->except('foto', 'cv', 'titulo_1', 'titulo_2', 'ine_1', 'ine_2'); // Excluir los archivos del array $data

    // Guardar archivos si se subieron
    if ($request->hasFile('cv')) {
        $data['cv'] = $request->file('cv')->store('documentos', 'public');
    }
    if ($request->hasFile('titulo_1')) {
        $data['titulo_1'] = $request->file('titulo_1')->store('documentos', 'public');
    }
    if ($request->hasFile('titulo_2')) {
        $data['titulo_2'] = $request->file('titulo_2')->store('documentos', 'public');
    }
    if ($request->hasFile('ine_1')) {
        $data['ine_1'] = $request->file('ine_1')->store('documentos', 'public');
    }
    if ($request->hasFile('ine_2')) {
        $data['ine_2'] = $request->file('ine_2')->store('documentos', 'public');
    }
    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('imagenes', 'public');
    }

    // Crear un nuevo profesional con los datos
    Profesional::create($data);

    // Redirigir al listado de profesionales con un mensaje de éxito
    return redirect()->route('profesionales.index')->with('success', 'Profesional agregado correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profesional = Profesional::findOrFail($id);
        return view('professional.show', compact('profesional'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profesional = Profesional::findOrFail($id);
        return view('professional.edit', compact('profesional'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Buscar el profesional por su id
    $profesional = Profesional::findOrFail($id);

    // Validación de los datos del formulario
    $request->validate([
        'primer_nombre' => 'required|string|max:255',
        'segundo_nombre' => 'nullable|string|max:255',
        'primer_apellido' => 'required|string|max:255',
        'segundo_apellido' => 'nullable|string|max:255',
        'profesion' => 'required|string|max:255',
        'especialidad' => 'nullable|string|max:255',
        'telefono' => 'required|string|max:20',
        'correo' => 'required|email|max:255|unique:profesionales,correo,' . $id,
        'pais' => 'required|string|max:100',
        'estado' => 'required|string|max:100',
        'ciudad' => 'required|string|max:100',
        'direccion' => 'required|string|max:255',
        'codigo_postal' => 'required|string|max:10',
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'instagram' => 'nullable|url',
        'linkedin' => 'nullable|url',
        'cv' => 'nullable|file|mimes:pdf|max:2048',
        'titulo_1' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'titulo_2' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'ine_1' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'ine_2' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Si el usuario ha subido una nueva foto, se guarda y reemplaza la anterior
    if ($request->hasFile('foto')) {
        // Eliminar la foto anterior, si existe
        if ($profesional->foto) {
            Storage::disk('public')->delete($profesional->foto);
        }
        // Guardar la nueva foto
        $profesional->foto = $request->file('foto')->store('profesionales', 'public');
    }

    // Actualizar los datos del profesional
    $profesional->update([
        'primer_nombre' => $request->primer_nombre,
        'segundo_nombre' => $request->segundo_nombre,
        'primer_apellido' => $request->primer_apellido,
        'segundo_apellido' => $request->segundo_apellido,
        'profesion' => $request->profesion,
        'especialidad' => $request->especialidad,
        'telefono' => $request->telefono,
        'correo' => $request->correo,
        'pais' => $request->pais,
        'estado' => $request->estado,
        'ciudad' => $request->ciudad,
        'direccion' => $request->direccion,
        'codigo_postal' => $request->codigo_postal,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'instagram' => $request->instagram,
        'linkedin' => $request->linkedin,
        'cv' => $request->cv ? $request->file('cv')->store('cv', 'public') : $profesional->cv,
        'titulo_1' => $request->titulo_1 ? $request->file('titulo_1')->store('titulos', 'public') : $profesional->titulo_1,
        'titulo_2' => $request->titulo_2 ? $request->file('titulo_2')->store('titulos', 'public') : $profesional->titulo_2,
        'ine_1' => $request->ine_1 ? $request->file('ine_1')->store('ine', 'public') : $profesional->ine_1,
        'ine_2' => $request->ine_2 ? $request->file('ine_2')->store('ine', 'public') : $profesional->ine_2,
    ]);

    // Redirigir al listado de profesionales con un mensaje de éxito
    return redirect()->route('profesionales.index')->with('success', 'Profesional actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
    {
        $profesional = Profesional::findOrFail($id);
        $profesional->delete();

        return redirect()->route('profesionales.index')->with('success', 'Servicio eliminado con éxito');
    }
}
