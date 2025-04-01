<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Asegúrate de que este modelo existe;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all(); // Cargar todos los usuarios desde la BD
        return view('comprador.usuarios', compact('usuarios'));
    }

    public function create()
    {
        return view('comprador.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|min:8|confirmed',
            'file_gafete' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_gafete2' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_credential' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_credential2' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);


        // Procesar archivos
        $filePaths = [];
        foreach (['file_gafete', 'file_gafete2', 'file_credential', 'file_credential2'] as $file) {
            if ($request->hasFile($file)) {
                $filePaths[$file] = $request->file($file)->store('public/documents');
            }
        }

        // Crear usuario
        $user = User::create([
            'user_type' => 'Secundario',
            'estatus' => 'Pendiente',
            'permisos' => 'Todos',
            'firstname' => $validatedData['firstname'],
            'second_name' => $request->second_name,
            'lastname' => $validatedData['lastname'],
            'second_lastname' => $request->second_lastname,
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => Hash::make($validatedData['password']),
            'passwordshow' => $validatedData['password'], // Guardar contraseña en texto plano (no recomendado en producción)
            'workstation' => $request->workstation,
            'area_work' => $request->area_work,
            'country' => $request->country,
            'state' => $request->state,
            'municipality' => $request->municipality,
            'colony' => $request->colony,
            'street' => $request->street,
            'street_number' => $request->street_number,
            'postal_code' => $request->postal_code,
            'file_gafete' => $filePaths['file_gafete'] ?? null,
            'file_gafete2' => $filePaths['file_gafete2'] ?? null,
            'file_credential' => $filePaths['file_credential'] ?? null,
            'file_credential2' => $filePaths['file_credential2'] ?? null,

        ]);

        return redirect()->route('comprador.usuarios')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $usuario)
    {
        return view('comprador.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'phone' => 'required|string|max:20',
            // Agrega validaciones para otros campos si es necesario
        ]);

        // Actualizar datos
        $usuario->update(array_merge($validatedData));

        return redirect()->route('comprador.usuarios')
            ->with('success', 'Usuario actualizado correctamente');
    }


    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('comprador.usuarios')->with('success', 'Usuario eliminado correctamente');
    }

    public function show(User $usuario)
    {
        // Verifica si el usuario existe
        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Retorna la vista con los datos del usuario
        return view('comprador.usuarios.info', compact('usuario'));
    }
}
