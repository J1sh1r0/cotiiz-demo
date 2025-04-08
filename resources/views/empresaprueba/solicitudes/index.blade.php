@extends('layouts.app')

@section('title', 'Solicitudes - Empresa Prueba')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Solicitudes</h1>
                <p class="text-gray-600">Listado de todas tus solicitudes</p>
            </div>
            <a href="{{ route('empresa_prueba.solicitudes.seleccionar-tipo') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i> Nueva Solicitud
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Título</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($solicitudes as $solicitud)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">{{ $solicitud->titulo }}</div>
                                    @if ($solicitud->descripcion)
                                        <div class="text-sm text-gray-500 mt-1">
                                            {{ Str::limit($solicitud->descripcion, 50) }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                                        {{ ucfirst($solicitud->tipo) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 text-xs rounded-full
                                {{ $solicitud->estado == 'pendiente'
                                    ? 'bg-yellow-100 text-yellow-800'
                                    : ($solicitud->estado == 'aprobado'
                                        ? 'bg-green-100 text-green-800'
                                        : ($solicitud->estado == 'completado'
                                            ? 'bg-blue-100 text-blue-800'
                                            : 'bg-red-100 text-red-800')) }}">
                                        {{ ucfirst($solicitud->estado) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $solicitud->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('empresa_prueba.solicitudes.ver', $solicitud->id) }}"
                                            class="text-blue-500 hover:text-blue-700" title="Ver detalles">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('empresa_prueba.solicitudes.editar', $solicitud->id) }}"
                                            class="text-yellow-500 hover:text-yellow-700" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('empresa_prueba.solicitudes.eliminar', $solicitud->id) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" title="Eliminar"
                                                onclick="return confirm('¿Estás seguro de eliminar esta solicitud?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    No hay solicitudes registradas
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($solicitudes->hasPages())
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{ $solicitudes->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
