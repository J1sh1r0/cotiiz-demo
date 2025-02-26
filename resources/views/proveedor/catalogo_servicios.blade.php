@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Catálogo de Servicios</h1>

        <p class="text-gray-600 mb-4">
            Aquí puedes ver una lista de los servicios ofrecidos en la plataforma.
            <span class="text-red-500 font-semibold">Esta es una versión demo, los datos son de prueba.</span>
        </p>

        <div class="flex justify-between items-center mb-4">
            <input type="text" placeholder="Buscar servicio..." class="p-2 border rounded w-1/3">
            <a href="#" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                + Agregar Servicio
            </a>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-md">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2 text-left">#</th>
                        <th class="border p-2 text-left">Nombre del Servicio</th>
                        <th class="border p-2 text-left">Categoría</th>
                        <th class="border p-2 text-left">Duración Estimada</th>
                        <th class="border p-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                        <tr class="border-t">
                            <td class="border p-2">{{ $loop->iteration }}</td>
                            <td class="border p-2">{{ $servicio->nombre }}</td>
                            <td class="border p-2">{{ $servicio->categoria }}</td>
                            <td class="border p-2">{{ $servicio->duracion }} horas</td>
                            <td class="border p-2 text-center">
                                <a href="#" class="text-blue-500 hover:underline">Editar</a> |
                                <a href="#" class="text-red-500 hover:underline">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
