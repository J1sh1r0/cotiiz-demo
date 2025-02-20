@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Empresas</h1>
        <a href="{{ route('empresas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Crear Empresa</a>
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
                    <th class="py-2 px-4 border-b text-center">Nombre</th>
                    <th class="py-2 px-4 border-b text-center">Correo</th>
                    <th class="py-2 px-4 border-b text-center">Teléfono</th>
                    <th class="py-2 px-4 border-b text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empresas as $empresa)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b text-center">{{ $empresa->id }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $empresa->nombre }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $empresa->correo }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $empresa->telefono }}</td>
                    <td class="py-2 px-4 border-b text-center">
                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="text-blue-500 hover:underline">Editar</a>
                        <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" class="inline delete-form">
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
