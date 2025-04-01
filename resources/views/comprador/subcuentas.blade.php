@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Subcuentas de la Empresa</h1>

        <p class="text-gray-600 mb-4">
            Aquí puedes ver las subcuentas asociadas a una empresa en la plataforma.
            <span class="text-red-500 font-semibold">Esta es una versión demo, por lo que los datos son de prueba.</span>
        </p>

        <div class="bg-white p-4 rounded-lg shadow-md">
            @if ($subcuentas->isEmpty())
                <p class="text-gray-500 py-4">No hay usuarios registrados.</p>
            @else
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2 text-left">Perfil</th>
                            <th class="border p-2 text-left">Usuario</th>
                            <th class="border p-2 text-left">Correo Electrónico</th>
                            <th class="border p-2 text-left">Teléfono</th>
                            <th class="border p-2 text-center">Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcuentas as $usuario)
                            <tr class="border-t">
                                <td class="border p-2 text-center">
                                    @if($usuario->user_type == 'Principal')
                                        <span class="bg-blue-100 text-blue-800 text-l font-medium px-2.5 py-0.5 rounded-full">
                                            Principal
                                        </span>
                                    @elseif($usuario->user_type == 'Secundario')
                                        <span class="bg-gray-100 text-gray-800 text-l font-medium px-2.5 py-0.5 rounded-full">
                                            Secundario
                                        </span>
                                    @else
                                        {{ $usuario->user_type }}
                                    @endif
                                </td>
                                <td class="border p-2">{{ $usuario->name }}</td>
                                <td class="border p-2">{{ $usuario->email }}</td>
                                <td class="border p-2">{{ $usuario->phone ?? 'N/A' }}</td>
                                <td class="border p-2 text-center">
                                    <span class="px-2 py-1 rounded-full text-l font-medium
                                        {{ $usuario->estatus == 'Aprobado' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($usuario->estatus ?? 'N/A') }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
