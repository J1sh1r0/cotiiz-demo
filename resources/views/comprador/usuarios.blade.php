@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Usuarios Registrados</h1>

        <p class="text-gray-600 mb-4">
            Aquí puedes ver una lista de usuarios registrados en la plataforma.
            <span class="text-red-500 font-semibold">Esta es una versión demo, por lo que los datos son de prueba.</span>
        </p>

        <div class="bg-white p-4 rounded-lg shadow-md">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2 text-left">Usuario</th>
                        <th class="border p-2 text-left">Correo Electrónico</th>
                        <th class="border p-2 text-left">Teléfono</th>
                        <th class="border p-2 text-left">Tipo de Usuario</th>
                        <th class="border p-2 text-center">Permisos</th>
                        <th class="border p-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($usuarios) && count($usuarios) > 0)
                        @foreach ($usuarios as $usuario)
                            <tr class="border-t">
                                <td class="border p-2">{{ $usuario->firstname }} {{ $usuario->lastname }} </td>
                                <td class="border p-2">{{ $usuario->email }}</td>
                                <td class="border p-2">{{ $usuario->phone }}</td>
                                <td class="border p-2 text-center">
                                    @if ($usuario->user_type == 'Principal')
                                        <span
                                            class="bg-blue-100 text-blue-800 text-l font-medium px-2.5 py-0.5 rounded-full">
                                            Principal
                                        </span>
                                    @elseif($usuario->user_type == 'Secundario')
                                        <span
                                            class="bg-gray-100 text-gray-800 text-l font-medium px-2.5 py-0.5 rounded-full">
                                            Secundario
                                        </span>
                                    @else
                                        {{ $usuario->user_type }}
                                    @endif
                                </td>
                                <td class="border p-2 text-center align-middle">
                                    <span class="bg-blue-100 text-blue-800 text-l font-medium px-2.5 py-0.5 rounded-full">
                                        {{ $usuario->permisos ?? 'Todos' }}
                                    </span>
                                </td>
                                <td class="border p-2 text-center">
                                    <!-- Botón para abrir modal -->
                                    <button onclick="openUserModal({{ $usuario->id }})"
                                        class="text-blue-500 hover:text-blue-700">
                                        Ver
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="border p-2 text-center text-gray-500">
                                No hay usuarios registrados.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="{{ route('comprador.usuarios.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded inline-block hover:bg-blue-600">
                Agregar Nuevo Usuario
            </a>
        </div>
    </div>

    <!-- Modal -->
    <div id="userModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-1/2 max-w-2xl">
            <!-- Encabezado -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Detalles del Usuario</h3>
                <button onclick="closeUserModal()" class="text-gray-500 hover:text-gray-700">
                    ✕
                </button>
            </div>

            <!-- Contenido dinámico -->
            <div id="modalContent" class="mb-4 p-4 bg-gray-50 rounded-lg min-h-32">
                <!-- La información del usuario aparecerá aquí -->
            </div>

            <!-- Botones de acción -->
            <div class="flex justify-end space-x-3">
                <button id="btnVerInfo" onclick="loadUserInfo()"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    <i class="ri-eye-line mr-1"></i> Ver Información
                </button>
                <a id="editUserBtn" href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                    <i class="ri-edit-line mr-1"></i> Editar
                </a>
                <form id="deleteUserForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded"
                        onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                        <i class="ri-delete-bin-line mr-1"></i> Eliminar
                    </button>
                </form>
                <button onclick="closeUserModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    <i class="ri-close-line mr-1"></i> Cerrar
                </button>
            </div>
        </div>
    </div>

    <script>
        let currentUserId = null;

        // Función para abrir el modal
        function openUserModal(userId) {
            currentUserId = userId;

            // Actualiza las rutas con el prefijo 'comprador'
            document.getElementById('deleteUserForm').action = `/comprador/usuarios/${userId}`;
            document.getElementById('editUserBtn').href = `/comprador/usuarios/${userId}/editar`;

            document.getElementById('userModal').classList.remove('hidden');
            loadUserInfo(); // Cargar información por defecto
        }

        // Función para cargar la información del usuario
        async function loadUserInfo() {
            try {
                const response = await fetch(`/comprador/usuarios/${currentUserId}/info`);

                if (!response.ok) {
                    throw new Error(`Error: ${response.status}`);
                }

                const html = await response.text();
                document.getElementById('modalContent').innerHTML = html;

                // Resaltar botón activo
                document.getElementById('btnVerInfo').classList.add('bg-blue-600');
                document.getElementById('btnVerInfo').classList.remove('bg-blue-500');

            } catch (error) {
                console.error('Error al cargar información:', error);
                document.getElementById('modalContent').innerHTML = `
            <div class="p-4 bg-red-50 text-red-600 rounded-lg">
                Error al cargar la información. Verifica la consola para más detalles.
            </div>
        `;
            }
        }

        // Función para cerrar el modal
        function closeUserModal() {
            document.getElementById('userModal').classList.add('hidden');
        }
    </script>
@endsection
