@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Solicitudes de Compra</h1>

        <p class="text-gray-600 mb-4">
            Aquí puedes visualizar cómo se verían las solicitudes que recibiría un comprador/empresa dentro de la
            plataforma.
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
                                <span
                                    class="px-2 py-1 rounded-full text-white
                                    {{ $solicitud->estado == 'pendiente' ? 'bg-yellow-500' : ($solicitud->estado == 'aprobado' ? 'bg-green-500' : 'bg-red-500') }}">
                                    {{ ucfirst($solicitud->estado) }}
                                </span>
                            </td>
                            <td class="border p-2">{{ $solicitud->created_at->format('d/m/Y') }}</td>
                            <td class="border p-2 text-center space-x-2">
                                <button onclick="openSolicitudModal({{ $solicitud->id }})"
                                    class="text-blue-500 hover:text-blue-700">
                                    Ver
                                </button>
                                <a href="{{ route('comprador.solicitudes.chat', $solicitud->id) }}"
                                   class="text-green-500 hover:text-green-700"
                                   title="Acceder al chat">
                                    <i class="ri-chat-3-line"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <a href="{{ route('comprador.solicitudes.crear') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded inline-block hover:bg-blue-600">
                Crear Nueva Solicitud
            </a>
        </div>
    </div>

    <!-- Modal para Solicitudes -->
    <div id="solicitudModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-1/2 max-w-2xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Opciones de Solicitud</h3>
                <button onclick="closeSolicitudModal()" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Contenido dinámico -->
            <div id="solicitudModalContent" class="mb-4 p-4 bg-gray-50 rounded-lg">
                <!-- La información de la solicitud aparecerá aquí -->
            </div>

            <!-- Botones de acción -->
            <div class="flex justify-end space-x-3">
                <a id="verSolicitudBtn" href="#"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded flex items-center">
                    <i class="ri-eye-line mr-2"></i> Ver Detalles
                </a>
                <a id="chatSolicitudBtn" href="#"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">
                    <i class="ri-chat-3-line mr-2"></i> Chat
                </a>
                <a id="editarSolicitudBtn" href="#"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded flex items-center">
                    <i class="ri-edit-line mr-2"></i> Editar
                </a>
                <form id="eliminarSolicitudForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded flex items-center"
                        onclick="return confirm('¿Estás seguro de eliminar esta solicitud?')">
                        <i class="ri-delete-bin-line mr-2"></i> Eliminar
                    </button>
                </form>
                <button onclick="closeSolicitudModal()"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded flex items-center">
                    <i class="ri-close-line mr-2"></i> Cerrar
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let currentSolicitudId = null;

        function openSolicitudModal(solicitudId) {
            currentSolicitudId = solicitudId;

            // Configurar rutas
            document.getElementById('verSolicitudBtn').href = `/comprador/solicitudes/${solicitudId}/ver`;
            document.getElementById('chatSolicitudBtn').href = `/comprador/solicitudes/${solicitudId}/chat`;
            document.getElementById('editarSolicitudBtn').href = `/comprador/solicitudes/${solicitudId}/editar`;
            document.getElementById('eliminarSolicitudForm').action = `{{ url('comprador/solicitudes') }}/${solicitudId}`;

            // Cargar información básica
            fetch(`/comprador/solicitudes/${solicitudId}/info`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('solicitudModalContent').innerHTML = html;
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('solicitudModalContent').innerHTML = `
                            <div class="text-red-500 p-2 bg-red-50 rounded">
                                Error al cargar la información de la solicitud
                            </div>
                        `;
                });

            // Mostrar modal
            document.getElementById('solicitudModal').classList.remove('hidden');
        }

        function closeSolicitudModal() {
            document.getElementById('solicitudModal').classList.add('hidden');
        }
    </script>
@endsection
