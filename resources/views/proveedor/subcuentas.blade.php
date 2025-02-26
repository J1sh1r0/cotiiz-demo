@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Subcuentas</h1>

    <div class="bg-white p-6 rounded shadow">
        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Nombre</th>
                    <th class="border border-gray-300 px-4 py-2">Correo Electrónico</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subcuentas as $subcuenta)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $subcuenta->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $subcuenta->nombre }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $subcuenta->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('subcuentas.edit', $subcuenta->id) }}" class="text-blue-500">Editar</a>
                        |
                        <form action="{{ route('subcuentas.destroy', $subcuenta->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
