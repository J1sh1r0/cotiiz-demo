<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProveedorUsuario; // Cambiado a ProveedorUsuario en lugar de User

class ProveedorUsuariosController extends Controller
{
    /**
     * Muestra una lista de usuarios proveedores.
     */
    public function index()
    {
        $usuarios = ProveedorUsuario::paginate(10); // Se usa paginate() en lugar de get()
        return view('usuarios.proveedor.index', compact('usuarios'));
    }

    /**
     * Muestra el formulario de creación de un usuario proveedor.
     */
    public function create()
    {
        return view('usuarios.proveedor.create');
    }

    /**
     * Almacena un nuevo usuario proveedor en la base de datos.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:proveedor_usuarios,email',
        'phone' => 'nullable|string|',
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'second_name' => 'nullable|string|max:255',
        'second_lastname' => 'nullable|string|max:255',
        'workstation' => 'required|string|max:255',
        'area_work' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'municipality' => 'required|string|max:255',
        'colony' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'street_number' => 'required|string|max:255',
        'postal_code' => 'required|string|max:20',
        'file_gafete' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'file_gafete2' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'file_credential' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'file_credential2' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    // Guardar el usuario
    $proveedorUsuario = ProveedorUsuario::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'status' => $request->status,
        'password' => bcrypt($request->password),
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'second_name' => $request->second_name,
        'second_lastname' => $request->second_lastname,
        'workstation' => $request->workstation,
        'area_work' => $request->area_work,
        'country' => $request->country,
        'state' => $request->state,
        'municipality' => $request->municipality,
        'colony' => $request->colony,
        'street' => $request->street,
        'street_number' => $request->street_number,
        'postal_code' => $request->postal_code,
    ]);

    // Manejo de archivos
    if ($request->hasFile('file_gafete')) {
        $fileGafete = $request->file('file_gafete');
        $fileGafetePath = $fileGafete->store('uploads/gafetes', 'public');
        $proveedorUsuario->file_gafete = $fileGafetePath;
    }

    if ($request->hasFile('file_gafete2')) {
        $fileGafete2 = $request->file('file_gafete2');
        $fileGafete2Path = $fileGafete2->store('uploads/gafetes', 'public');
        $proveedorUsuario->file_gafete2 = $fileGafete2Path;
    }

    if ($request->hasFile('file_credential')) {
        $fileCredential = $request->file('file_credential');
        $fileCredentialPath = $fileCredential->store('uploads/credenciales', 'public');
        $proveedorUsuario->file_credential = $fileCredentialPath;
    }

    if ($request->hasFile('file_credential2')) {
        $fileCredential2 = $request->file('file_credential2');
        $fileCredential2Path = $fileCredential2->store('uploads/credenciales', 'public');
        $proveedorUsuario->file_credential2 = $fileCredential2Path;
    }

    // Guardar los archivos y actualizar el registro
    $proveedorUsuario->save();

    return redirect()->route('proveedor.usuarios.index')->with('success', 'Usuario agregado correctamente.');
}

    /**
     * Muestra los detalles de un usuario proveedor.
     */
    public function show($id)
    {
        $usuario = ProveedorUsuario::findOrFail($id);
        return view('usuarios.proveedor.show', compact('usuario'));
    }

    /**
     * Muestra el formulario para editar un usuario proveedor.
     */
    public function edit($id)
    {
        $usuario = ProveedorUsuario::findOrFail($id);
        return view('usuarios.proveedor.edit', compact('usuario'));
    }

    /**
     * Actualiza los datos de un usuario proveedor.
     */
    public function update(Request $request, $id)
    {
        $usuario = ProveedorUsuario::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:proveedor_usuarios,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'status' => 'required|in:Activo,Pendiente,Inactivo',
        ]);

        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        return redirect()->route('proveedor.usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Elimina un usuario proveedor.
     */
    public function destroy($id)
    {
        $usuario = ProveedorUsuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('proveedor.usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}