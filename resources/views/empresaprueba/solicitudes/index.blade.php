@extends('layouts.app')

@section('title', 'Solicitudes - Empresa Prueba')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Modal de confirmación para eliminar -->
        <div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center">
            <div class="relative p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <i class="ri-alert-fill text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mt-3">¿Eliminar solicitud?</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-500">¿Estás seguro de que deseas eliminar esta solicitud? Esta acción no se puede deshacer.</p>
                    </div>
                    <div class="items-center px-4 py-3">
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-md hover:bg-gray-300 mr-2">
                                Cancelar
                            </button>
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700">
                                Sí, eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card principal -->
        <div class="bg-white rounded-lg shadow-sm">
            <!-- Encabezado -->
            <div class="px-8 py-6 border-b border-gray-100">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="flex items-center mb-4 md:mb-0">
                        <div class="p-2 bg-blue-100 rounded-lg text-blue-600 mr-4">
                            <i class="ri-file-list-2-line text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Solicitudes</h1>
                        </div>
                    </div>
                    <a href="{{ route('empresa_prueba.solicitudes.seleccionar-tipo') }}"
                        class="flex items-center px-4 py-2.5 bg-blue-600 text-white rounded-lg shadow-sm hover:bg-blue-700 transition-colors duration-200">
                        <i class="ri-add-line mr-2"></i> Nueva Solicitud
                    </a>
                </div>
            </div>

            <!-- Mensaje de éxito -->
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mx-8 mt-4 rounded">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 text-green-400">
                            <i class="ri-checkbox-circle-fill"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Controles de filtrado -->
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center">
                        <span class="text-sm text-gray-600 mr-2">Mostrar</span>
                        <select id="rowsPerPage" class="block w-20 pl-3 pr-8 py-2 text-sm border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="-1">Todos</option>
                        </select>
                        <span class="text-sm text-gray-600 ml-2">registros</span>
                    </div>

                    <div class="relative w-full md:w-64">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ri-search-line text-gray-400"></i>
                        </div>
                        <input type="text" id="searchInput" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Buscar...">
                    </div>
                </div>
            </div>

            <!-- Tabla de solicitudes -->
<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody id="tableBody" class="divide-y divide-gray-200">
            @forelse($solicitudes as $index => $solicitud)
                <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">{{ $solicitud->titulo }}</div>
                        @if ($solicitud->descripcion)
                            <div class="text-sm text-gray-500 mt-1">
                                {{ Str::limit($solicitud->descripcion, 50) }}
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                            {{ ucfirst($solicitud->tipo) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs rounded-full 
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
                        <div class="flex space-x-3">
                            <a href="{{ route('empresa_prueba.solicitudes.ver', $solicitud->id) }}"
                                class="text-blue-500 hover:text-blue-700 transition-colors duration-200"
                                title="Ver detalles">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                            <a href="{{ route('empresa_prueba.solicitudes.editar', $solicitud->id) }}"
                                class="text-yellow-500 hover:text-yellow-700 transition-colors duration-200"
                                title="Editar">
                                <i class="ri-edit-line text-lg"></i>
                            </a>
                            <button type="button" onclick="openModal('{{ route('empresa_prueba.solicitudes.eliminar', $solicitud->id) }}')" 
                                class="text-red-500 hover:text-red-700 transition-colors duration-200" 
                                title="Eliminar">
                                <i class="ri-delete-bin-line text-lg"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center py-8">
                            <i class="ri-file-search-line text-4xl text-gray-300 mb-2"></i>
                            <p>No hay solicitudes registradas</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

            <!-- Paginación -->
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <p id="resultCount" class="text-sm text-gray-500">
                            Mostrando
                            <span class="font-medium text-gray-700">1</span>
                            a
                            <span class="font-medium text-gray-700">{{ min(10, $solicitudes->count()) }}</span>
                            de
                            <span class="font-medium text-gray-700">{{ $solicitudes->total() }}</span>
                            resultados
                        </p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button id="prevPage" class="px-3 py-1 border border-gray-300 rounded-md bg-white text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>
                            <i class="ri-arrow-left-s-line"></i>
                        </button>
                        <span id="currentPage" class="px-3 py-1 bg-blue-500 text-white rounded-md">1</span>
                        <button id="nextPage" class="px-3 py-1 border border-gray-300 rounded-md bg-white text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>
                            <i class="ri-arrow-right-s-line"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Variables para la paginación
        let currentPage = 1;
        let rowsPerPage = 10;
        let filteredRows = [];
        let allRows = [];
        
        // Funciones para el modal de eliminación
        function openModal(deleteUrl) {
            document.getElementById('deleteForm').action = deleteUrl;
            document.getElementById('deleteModal').classList.remove('hidden');
        }
        
        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
        
        // Función para filtrar la tabla
        function filterTable() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            
            filteredRows = Array.from(allRows).filter(row => {
                const cells = row.querySelectorAll('td');
                let rowText = '';
                
                for (let i = 0; i < cells.length - 1; i++) {
                    rowText += cells[i].textContent.toLowerCase() + ' ';
                }
                
                return rowText.includes(searchTerm);
            });
            
            allRows.forEach(row => row.style.display = 'none');
            currentPage = 1;
            updatePagination();
        }
        
        // Función para actualizar la paginación
        function updatePagination() {
            const totalRows = filteredRows.length;
            const totalPages = Math.ceil(totalRows / rowsPerPage);
            
            const startIndex = (currentPage - 1) * rowsPerPage;
            const endIndex = rowsPerPage === -1 ? totalRows : startIndex + rowsPerPage;
            
            filteredRows.forEach((row, index) => {
                if (rowsPerPage === -1 || (index >= startIndex && index < endIndex)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
            
            document.getElementById('currentPage').textContent = currentPage;
            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages || totalPages === 0 || rowsPerPage === -1;
            
            const showingStart = totalRows > 0 ? startIndex + 1 : 0;
            const showingEnd = rowsPerPage === -1 ? totalRows : Math.min(endIndex, totalRows);
            
            document.getElementById('resultCount').innerHTML = `
                Mostrando
                <span class="font-medium text-gray-700">${showingStart}</span>
                a
                <span class="font-medium text-gray-700">${showingEnd}</span>
                de
                <span class="font-medium text-gray-700">${totalRows}</span>
                resultados
            `;
        }
        
        // Event listeners
        document.getElementById('searchInput').addEventListener('input', filterTable);
        document.getElementById('rowsPerPage').addEventListener('change', function() {
            rowsPerPage = parseInt(this.value);
            currentPage = 1;
            updatePagination();
        });
        document.getElementById('prevPage').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                updatePagination();
            }
        });
        document.getElementById('nextPage').addEventListener('click', function() {
            const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                updatePagination();
            }
        });
        
        // Inicialización
        document.addEventListener('DOMContentLoaded', function() {
            allRows = Array.from(document.querySelectorAll('.solicitud-row'));
            filteredRows = Array.from(allRows);
            document.getElementById('rowsPerPage').value = rowsPerPage;
            updatePagination();
            
            // Cerrar modal al hacer clic fuera del contenido
            document.getElementById('deleteModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });
        });
    </script>
<style>
    #deleteModal {
    z-index: 9999; /* Esto asegura que el modal está por encima de los otros elementos */
}
</style>
@endsection

<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">