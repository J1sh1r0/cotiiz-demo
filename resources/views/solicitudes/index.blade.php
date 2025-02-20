@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Solicitudes</h1>
        <a href="{{ route('solicitudes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Nueva Solicitud</a>
    </div>

    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Eliminado',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        </script>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg text-center">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b text-center">ID</th>
                    <th class="py-2 px-4 border-b text-center">Empresa</th>
                    <th class="py-2 px-4 border-b text-center">Proveedor</th>
                    <th class="py-2 px-4 border-b text-center">Servicio</th>
                    <th class="py-2 px-4 border-b text-center">Descripción</th>
                    <th class="py-2 px-4 border-b text-center">Estado</th>
                    <th class="py-2 px-4 border-b text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitudes as $solicitud)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b text-center">{{ $solicitud->id }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $solicitud->empresa->nombre }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $solicitud->proveedor->nombre }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $solicitud->servicio->nombre }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $solicitud->descripcion }}</td>
                    <td class="py-2 px-4 border-b text-center">
                        @if($solicitud->estado == 'aprobado')
                            <span class="bg-green-500 text-white px-2 py-1 rounded">Aprobado</span>
                        @else
                            <span class="bg-yellow-500 text-white px-2 py-1 rounded">Pendiente</span>
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b text-center">
                        <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="text-blue-500 hover:underline">Editar</a>
                        <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ml-2">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteForms = document.querySelectorAll(".delete-form");
        deleteForms.forEach(form => {
            form.addEventListener("submit", function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede deshacer.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    });
</script>
@endsection
