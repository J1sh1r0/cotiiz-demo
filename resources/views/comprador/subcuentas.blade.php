@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Tarjeta contenedora -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <!-- Encabezado -->
        <div class="px-6 py-5 border-b border-gray-100">
            <div class="flex items-center">
                <div class="p-2 rounded-lg bg-blue-50 text-blue-600 mr-4">
                    <i class="fas fa-building-user text-xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Subcuentas</h1>
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

        <!-- Tabla de subcuentas -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Perfil</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estatus</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                    @forelse ($subcuentas as $index => $usuario)
                    <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-blue-50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($usuario->user_type == 'Principal')
                                <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Principal
                                </span>
                            @else
                                <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Secundario
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $usuario->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $usuario->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $usuario->phone ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $usuario->estatus == 'Aprobado' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($usuario->estatus ?? 'N/A') }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No hay usuarios registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-xl">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p id="resultCount" class="text-sm text-gray-500">
                        Mostrando
                        <span class="font-medium text-gray-700">1</span>
                        a
                        <span class="font-medium text-gray-700">{{ min(10, $subcuentas->count()) }}</span>
                        de
                        <span class="font-medium text-gray-700">{{ $subcuentas->count() }}</span>
                        resultados
                    </p>
                </div>
                <div class="flex items-center space-x-1">
                    <button id="prevPage" class="px-3 py-1 border border-gray-300 rounded-md bg-white text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <span id="currentPage" class="px-3 py-1 bg-blue-600 text-white rounded-md">1</span>
                    <button id="nextPage" class="px-3 py-1 border border-gray-300 rounded-md bg-white text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Incluye el mismo script de filtrado/paginación -->
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
            
            for (let i = 0; i < cells.length; i++) {
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
            row.style.display = (rowsPerPage === -1 || (index >= startIndex && index < endIndex)) ? '' : 'none';
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
    document.getElementById('prevPage').addEventListener('click', () => { if (currentPage > 1) currentPage--; updatePagination(); });
    document.getElementById('nextPage').addEventListener('click', () => { const totalPages = Math.ceil(filteredRows.length / rowsPerPage); if (currentPage < totalPages) currentPage++; updatePagination(); });
    
    // Inicialización
    document.addEventListener('DOMContentLoaded', function() {
        allRows = Array.from(document.querySelectorAll('#tableBody tr'));
        filteredRows = Array.from(allRows);
        document.getElementById('rowsPerPage').value = rowsPerPage;
        updatePagination();
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection