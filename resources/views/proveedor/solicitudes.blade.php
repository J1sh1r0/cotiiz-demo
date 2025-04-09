@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Encabezado -->
        <div class="bg-white rounded-lg shadow-sm mb-8">
            <div class="px-8 py-6 border-b border-gray-100">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="flex items-center mb-4 md:mb-0">
                        <i class="ri-mail-line text-2xl text-gray-600 mr-3"></i>
                        <h1 class="text-2xl font-bold text-gray-800">Solicitudes Recibidas</h1>
                    </div>
                </div>
            </div>

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
                            <i class="fas fa-search text-gray-400"></i>
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
                            <th scope="col" class="w-2/4 px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Título</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Estatus</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                        @php
                            $solicitudes = [
                                (object) ['titulo' => 'Solicitud de 50 laptops para oficina', 'estado' => 'pendiente'],
                                (object) ['titulo' => 'Servicio de mantenimiento de servidores', 'estado' => 'aprobado'],
                                (object) ['titulo' => 'Pedido de 100 sillas ergonómicas', 'estado' => 'rechazado'],
                                (object) ['titulo' => 'Reparación de aire acondicionado', 'estado' => 'pendiente'],
                                (object) ['titulo' => 'Cotización de impresoras láser', 'estado' => 'aprobado'],
                                (object) ['titulo' => 'Solicitud de desarrollo de software a medida', 'estado' => 'pendiente'],
                            ];
                        @endphp
                        
                        @foreach($solicitudes as $index => $solicitud)
                        <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100 transition-colors duration-150">
                            <!-- Título -->
                            <td class="w-2/4 px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $solicitud->titulo }}</div>
                            </td>

                            <!-- Estatus -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $solicitud->estado == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : 
                                       ($solicitud->estado == 'aprobado' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($solicitud->estado) }}
                                </span>
                            </td>

                            <!-- Acciones -->
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex justify-center space-x-3">
                                    <!-- Chat -->
                                    <a href="#" class="text-blue-500 hover:text-blue-700 transition-colors duration-200" title="Ver detalles">
                                        <i class="ri-chat-3-line text-lg"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
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
                            <span class="font-medium text-gray-700">{{ min(10, count($solicitudes)) }}</span>
                            de
                            <span class="font-medium text-gray-700">{{ count($solicitudes) }}</span>
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
        
        // Función para filtrar la tabla
        function filterTable() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            
            filteredRows = Array.from(allRows).filter(row => {
                const cells = row.querySelectorAll('td');
                let rowText = '';
                
                // Concatenamos el texto de todas las celdas excepto la última (acciones)
                for (let i = 0; i < cells.length - 1; i++) {
                    rowText += cells[i].textContent.toLowerCase() + ' ';
                }
                
                // Comprobamos si el término de búsqueda está en alguna celda
                return rowText.includes(searchTerm);
            });
            
            // Ocultar todas las filas primero
            allRows.forEach(row => row.style.display = 'none');
            
            // Actualizar paginación
            currentPage = 1;
            updatePagination();
        }
        
        // Función para actualizar la paginación
        function updatePagination() {
            const totalRows = filteredRows.length;
            const totalPages = Math.ceil(totalRows / rowsPerPage);
            
            // Mostrar solo las filas de la página actual
            const startIndex = (currentPage - 1) * rowsPerPage;
            const endIndex = rowsPerPage === -1 ? totalRows : startIndex + rowsPerPage;
            
            filteredRows.forEach((row, index) => {
                if (rowsPerPage === -1 || (index >= startIndex && index < endIndex)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Actualizar controles de paginación
            document.getElementById('currentPage').textContent = currentPage;
            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages || totalPages === 0 || rowsPerPage === -1;
            
            // Actualizar contador de resultados
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
            // Almacenar todas las filas
            allRows = Array.from(document.querySelectorAll('#tableBody tr'));
            filteredRows = Array.from(allRows);
            
            // Configurar el valor inicial del selector
            document.getElementById('rowsPerPage').value = rowsPerPage;
            
            // Actualizar la paginación inicial
            updatePagination();
        });
    </script>
@endsection

<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">