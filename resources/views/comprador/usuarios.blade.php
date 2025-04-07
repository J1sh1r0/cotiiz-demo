@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Encabezado -->
    <div class="bg-white rounded-lg shadow-sm mb-8">
        <div class="px-8 py-6 border-b border-gray-100">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div class="flex items-center mb-4 md:mb-0">
                    <i class="ri-user-line text-2xl text-gray-600 mr-3"></i>
                    <h1 class="text-2xl font-bold text-gray-800">Usuarios</h1>
                </div>
                <a href="{{ route('comprador.usuarios.create') }}" class="flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md transition duration-200">
                    <i class="ri-add-line mr-2"></i> Agregar Nuevo Usuario
                </a>
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

        <!-- Tabla de usuarios -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Usuario</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Correo Electrónico</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Teléfono</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Tipo de Usuario</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">Permisos</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                    @if (isset($usuarios) && count($usuarios) > 0)
                        @foreach ($usuarios as $usuario)
                        <tr class="hover:bg-gray-100 transition-colors duration-150">
                            <!-- Usuario -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $usuario->firstname }} {{ $usuario->lastname }}</div>
                            </td>

                            <!-- Correo -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $usuario->email }}</div>
                            </td>

                            <!-- Teléfono -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $usuario->phone }}</div>
                            </td>

                            <!-- Tipo de Usuario -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $usuario->user_type == 'Principal' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $usuario->user_type }}
                                </span>
                            </td>

                            <!-- Permisos -->
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $usuario->permisos ?? 'Todos' }}
                                </span>
                            </td>

                            <!-- Acciones -->
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <button onclick="openUserModal({{ $usuario->id }})" 
                                    class="text-blue-500 hover:text-blue-700 transition-colors duration-200" title="Ver detalles">
                                    <i class="ri-eye-line text-lg"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                No hay usuarios registrados.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="px-6 py-4 border-t border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p id="resultCount" class="text-sm text-gray-500">
                        Mostrando
                        <span class="font-medium text-gray-700">0</span>
                        a
                        <span class="font-medium text-gray-700">{{ isset($usuarios) ? min(10, count($usuarios)) : 0 }}</span>
                        de
                        <span class="font-medium text-gray-700">{{ isset($usuarios) ? count($usuarios) : 0 }}</span>
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

<!-- Modal -->
<div id="userModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-11/12 md:w-1/2 max-w-2xl shadow-xl">
        <!-- Encabezado -->
        <div class="flex justify-between items-center mb-4 border-b pb-2">
            <h3 class="text-xl font-bold text-gray-800">Detalles del Usuario</h3>
            <button onclick="closeUserModal()" class="text-gray-500 hover:text-gray-700 transition-colors duration-200">
                <i class="ri-close-line text-2xl"></i>
            </button>
        </div>

        <!-- Contenido dinámico -->
        <div id="modalContent" class="mb-4 p-4 bg-gray-50 rounded-lg min-h-32">
            <!-- La información del usuario aparecerá aquí -->
        </div>

        <!-- Botones de acción -->
        <div class="flex flex-wrap justify-end gap-3 mt-4">
            <button id="btnVerInfo" onclick="loadUserInfo()"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded flex items-center transition-colors duration-200">
                <i class="ri-eye-line mr-2"></i> Ver Información
            </button>
            <a id="editUserBtn" href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded flex items-center transition-colors duration-200">
                <i class="ri-edit-line mr-2"></i> Editar
            </a>
            <form id="deleteUserForm" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded flex items-center transition-colors duration-200"
                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                    <i class="ri-delete-bin-line mr-2"></i> Eliminar
                </button>
            </form>
            <button onclick="closeUserModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded flex items-center transition-colors duration-200">
                <i class="ri-close-line mr-2"></i> Cerrar
            </button>
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
            
            // Concatenamos el texto de todas las celdas
            for (let i = 0; i < cells.length; i++) {
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
    
    // Event listeners para paginación
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
    
    // Inicialización de la tabla
    document.addEventListener('DOMContentLoaded', function() {
        // Almacenar todas las filas
        allRows = Array.from(document.querySelectorAll('#tableBody tr'));
        filteredRows = Array.from(allRows);
        
        // Configurar el valor inicial del selector
        document.getElementById('rowsPerPage').value = rowsPerPage;
        
        // Actualizar la paginación inicial
        updatePagination();
    });

    // Funciones del modal
    let currentUserId = null;

    function openUserModal(userId) {
        currentUserId = userId;
        document.getElementById('deleteUserForm').action = `/comprador/usuarios/${userId}`;
        document.getElementById('editUserBtn').href = `/comprador/usuarios/${userId}/editar`;
        document.getElementById('userModal').classList.remove('hidden');
        loadUserInfo();
    }

    async function loadUserInfo() {
        try {
            const response = await fetch(`/comprador/usuarios/${currentUserId}/info`);
            if (!response.ok) throw new Error(`Error: ${response.status}`);
            
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

    function closeUserModal() {
        document.getElementById('userModal').classList.add('hidden');
    }
</script>
@endsection

<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">