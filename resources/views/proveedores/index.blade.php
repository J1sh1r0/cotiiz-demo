@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Proveedores</h1>
        <a href="{{ route('proveedores.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Crear Proveedor</a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Nombre</th>
                    <th class="p-3 text-left">Correo</th>
                    <th class="p-3 text-left">Teléfono</th>
                    <th class="p-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proveedores as $proveedor)
                <tr class="border-b">
                    <td class="p-3">{{ $proveedor->id }}</td>
                    <td class="p-3">{{ $proveedor->nombre }}</td>
                    <td class="p-3">{{ $proveedor->correo }}</td>
                    <td class="p-3">{{ $proveedor->telefono }}</td>
                    <td class="p-3">
                        <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="text-blue-500">Editar</a>
                        <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
