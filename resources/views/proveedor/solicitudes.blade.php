@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Solicitudes Recibidas</h1>

        <p class="text-gray-600 mb-4">
            Aquí puedes ver una lista de solicitudes enviadas por los compradores.
            <span class="text-red-500 font-semibold">Esta es una versión demo, los datos son de prueba.</span>
        </p>

        <!-- Barra de búsqueda -->
        <div class="flex justify-between items-center mb-4">
            <input type="text" placeholder="Buscar solicitud..." class="p-2 border rounded w-1/3">
        </div>

        <!-- Tabla de solicitudes -->
        <div class="bg-white p-4 rounded-lg shadow-md">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2 text-left">#</th>
                        <th class="border p-2 text-left">Título</th>
                        <th class="border p-2 text-left">Estado</th>
                        <th class="border p-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitudes as $solicitud)
                        <tr class="border-t">
                            <td class="border p-2">{{ $loop->iteration }}</td>
                            <td class="border p-2">{{ $solicitud->titulo }}</td>
                            <td class="border p-2">
                                <span class="px-2 py-1 rounded text-white 
                                    {{ $solicitud->estado == 'pendiente' ? 'bg-yellow-500' : ($solicitud->estado == 'aprobado' ? 'bg-green-500' : 'bg-red-500') }}">
                                    {{ ucfirst($solicitud->estado) }}
                                </span>
                            </td>
                            <td class="border p-2 text-center">
                                <a href="#" class="text-blue-500 hover:underline">Ver Detalles</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
