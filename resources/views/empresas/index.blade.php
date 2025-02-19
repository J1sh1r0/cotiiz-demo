@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Empresas</h1>
        <a href="{{ route('empresas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Crear Empresa</a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        @if($empresas->isEmpty())
            <p class="text-gray-600 text-center py-4">No hay empresas registradas.</p>
        @else
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Nombre</th>
                        <th class="py-2 px-4 border-b">Correo</th>
                        <th class="py-2 px-4 border-b">Teléfono</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empresas as $empresa)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-2 px-4 border-b text-center">{{ $empresa->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $empresa->nombre }}</td>
                        <td class="py-2 px-4 border-b">{{ $empresa->correo }}</td>
                        <td class="py-2 px-4 border-b">{{ $empresa->telefono }}</td>
                        <td class="py-2 px-4 border-b flex space-x-2">
                            <a href="{{ route('empresas.edit', $empresa->id) }}" class="text-blue-500 hover:text-blue-700 transition">Editar</a>
                            <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta empresa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
