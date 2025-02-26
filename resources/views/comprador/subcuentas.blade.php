@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Subcuentas de la Empresa</h1>
        
        <p class="text-gray-600 mb-4">
            Aquí puedes ver las subcuentas asociadas a una empresa en la plataforma.
            <span class="text-red-500 font-semibold">Esta es una versión demo, por lo que los datos son de prueba.</span>
        </p>

        <div class="bg-white p-4 rounded-lg shadow-md">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2 text-left">#</th>
                        <th class="border p-2 text-left">Nombre</th>
                        <th class="border p-2 text-left">Correo Electrónico</th>
                        <th class="border p-2 text-left">Rol</th>
                        <th class="border p-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcuentas as $subcuenta)
                        <tr class="border-t">
                            <td class="border p-2">{{ $loop->iteration }}</td>
                            <td class="border p-2">{{ $subcuenta->nombre }}</td>
                            <td class="border p-2">{{ $subcuenta->email }}</td>
                            <td class="border p-2">{{ ucfirst($subcuenta->rol) }}</td>
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
                Agregar Nueva Subcuenta
            </a>
        </div>
    </div>
@endsection
