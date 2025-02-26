@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Cuentas de Proveedor</h1>

        <div class="bg-white shadow-md rounded p-4">
            <h2 class="text-xl font-semibold mb-3">Usuarios Asociados</h2>
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-2">Nombre</th>
                        <th class="border border-gray-300 p-2">Correo Electrónico</th>
                        <th class="border border-gray-300 p-2">Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $usuario->nombre }}</td>
                            <td class="border border-gray-300 p-2">{{ $usuario->email }}</td>
                            <td class="border border-gray-300 p-2">{{ $usuario->rol }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
