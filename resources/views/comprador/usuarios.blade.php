@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Usuarios Registrados</h1>
        
        <p class="text-gray-600 mb-4">
            Aquí puedes ver una lista de usuarios registrados en la plataforma.
            <span class="text-red-500 font-semibold">Esta es una versión demo, por lo que los datos son de prueba.</span>
        </p>

        <div class="bg-white p-4 rounded-lg shadow-md">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2 text-left">#</th>
                        <th class="border p-2 text-left">Nombre</th>
                        <th class="border p-2 text-left">Correo Electrónico</th>
                        <th class="border p-2 text-left">Teléfono</th>
                        <th class="border p-2 text-left">Tipo de Usuario</th>
                        <th class="border p-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr class="border-t">
                            <td class="border p-2">{{ $loop->iteration }}</td>
                            <td class="border p-2">{{ $usuario->nombre }}</td>
                            <td class="border p-2">{{ $usuario->email }}</td>
                            <td class="border p-2">{{ $usuario->telefono }}</td>
                            <td class="border p-2">{{ ucfirst($usuario->tipo) }}</td>
                            <td class="border p-2 text-center">
                                <a href="#" class="text-blue-500 hover:underline">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded inline-block hover:bg-blue-600">
                Agregar Nuevo Usuario
            </a>
        </div>
    </div>
@endsection
