@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Solicitudes de Compra</h1>

        <p class="text-gray-600 mb-4">
            Aquí puedes visualizar cómo se verían las solicitudes que recibiría un comprador/empresa dentro de la plataforma.
            <span class="text-red-500 font-semibold">Esta es una versión demo, por lo que los datos son de prueba.</span>
        </p>

        <div class="bg-white p-4 rounded-lg shadow-md">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2 text-left">#</th>
                        <th class="border p-2 text-left">Título</th>
                        <th class="border p-2 text-left">Estado</th>
                        <th class="border p-2 text-left">Fecha de Creación</th>
                        <th class="border p-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitudes as $solicitud)
                        <tr class="border-t">
                            <td class="border p-2">{{ $loop->iteration }}</td>
                            <td class="border p-2">{{ $solicitud->titulo }}</td>
                            <td class="border p-2">
                                <span class="px-2 py-1 rounded-full text-white
                                    {{ $solicitud->estado == 'pendiente' ? 'bg-yellow-500' : ($solicitud->estado == 'aprobado' ? 'bg-green-500' : 'bg-red-500') }}">
                                    {{ ucfirst($solicitud->estado) }}
                                </span>
                            </td>
                            <td class="border p-2">{{ $solicitud->created_at->format('d/m/Y') }}</td>
                            <td class="border p-2 text-center">
                                <a href="{{ route('comprador.solicitudes.ver', $solicitud->id) }}" class="text-blue-500 hover:underline">
                                    Ver
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="{{ route('comprador.solicitudes.crear') }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block hover:bg-blue-600">
                Crear Nueva Solicitud
            </a>
        </div>
    </div>
@endsection
