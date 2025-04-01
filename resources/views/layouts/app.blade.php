<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotiiz Demo</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .compact-items-sidebar {
            width: 250px;
            transition: all 0.3s ease;
        }
        .compact-items-sidebar .nav-item {
            padding: 0.5rem 0.8rem;
            font-size: 0.875rem;
        }
        .compact-items-sidebar .logo {
            width: 140px;
            margin-bottom: 1.5rem;
        }
        .compact-items-sidebar .profile-box {
            padding: 0.6rem;
            margin-bottom: 1.5rem;
        }
        .compact-items-sidebar .nav-icon {
            width: 1.25rem;
            font-size: 0.875rem;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- Contenedor principal -->
    <div class="flex h-screen">

        <!-- Sidebar con elementos compactos -->
        <aside class="compact-items-sidebar bg-gradient-to-b from-gray-800 to-gray-900 text-white shadow-xl">
            <div class="p-5">
                <!-- Logo más compacto -->
                <div class="text-center">
                    <img src="{{ asset('images/CotiizNFondo.png') }}" alt="Cotiiz Logo" class="logo mx-auto">
                </div>

                <!-- Perfil seleccionado compacto -->
                <div class="profile-box bg-gray-700 bg-opacity-50 rounded-lg border border-gray-600">
                    <p class="text-xs text-gray-300 uppercase tracking-wider">Perfil actual</p>
                    <p class="font-bold text-white text-base mt-1">
                        {{ ucfirst(session('perfil', 'No seleccionado')) }}
                    </p>
                    <a href="{{ route('seleccion.perfil') }}" class="text-blue-400 hover:text-blue-300 text-xs flex items-center mt-1.5 transition-colors">
                        <i class="fas fa-sync-alt mr-1"></i> Cambiar perfil
                    </a>
                </div>

                <!-- Navegación compacta -->
                <nav class="space-y-1.5">
                    <a href="{{ route('dashboard') }}"
                       class="nav-item flex items-center rounded-lg transition-all duration-200 {{ Route::is('dashboard') ? 'bg-blue-600 text-white shadow-md' : 'hover:bg-gray-700 hover:text-white' }}">
                        <i class="fas fa-tachometer-alt nav-icon text-center text-blue-300"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>

                    <!-- Menú para Compradores -->
                    @if (session('perfil') === 'comprador')
                        <a href="{{ route('comprador.solicitudes') }}"
                           class="nav-item flex items-center rounded-lg transition-all {{ Route::is('comprador.solicitudes') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-file-alt nav-icon text-center text-blue-300"></i>
                            <span class="ml-3">Solicitudes</span>
                        </a>
                        <a href="{{ route('comprador.usuarios') }}"
                           class="nav-item flex items-center rounded-lg transition-all {{ Route::is('comprador.usuarios') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-users nav-icon text-center text-purple-300"></i>
                            <span class="ml-3">Usuarios</span>
                        </a>
                        <a href="{{ route('comprador.subcuentas') }}"
                           class="nav-item flex items-center rounded-lg transition-all {{ Route::is('comprador.subcuentas') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-key nav-icon text-center text-yellow-300"></i>
                            <span class="ml-3">Subcuentas</span>
                        </a>
                    @endif

                    <!-- Menú para Proveedores -->
                    @if (session('perfil') === 'proveedor')
                        <a href="{{ route('proveedor.solicitudes') }}"
                           class="nav-item flex items-center rounded-lg transition-all {{ Route::is('proveedor.solicitudes') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-file-contract nav-icon text-center text-green-300"></i>
                            <span class="ml-3">Solicitudes</span>
                            <span class="ml-auto bg-blue-500 text-white text-xs px-1.5 py-0.5 rounded-full">5</span>
                        </a>
                        <a href="{{ route('productos.index') }}"
                           class="nav-item flex items-center rounded-lg transition-all {{ Route::is('productos.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-box-open nav-icon text-center text-yellow-300"></i>
                            <span class="ml-3">Productos</span>
                        </a>
                        <a href="{{ route('Servicio.index') }}"
                           class="nav-item flex items-center rounded-lg transition-all {{ Route::is('Servicio.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-cogs nav-icon text-center text-red-300"></i>
                            <span class="ml-3">Servicios</span>
                        </a>
                        <a href="{{ route('profesionales.index') }}"
                           class="nav-item flex items-center rounded-lg transition-all {{ Route::is('profesionales.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-user-graduate nav-icon text-center text-purple-300"></i>
                            <span class="ml-3">Profesionales</span>
                        </a>
                        <a href="{{ route('proveedor.subcuentas') }}"
                           class="nav-item flex items-center rounded-lg transition-all {{ Route::is('proveedor.subcuentas') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-key nav-icon text-center text-orange-300"></i>
                            <span class="ml-3">Subcuentas</span>
                        </a>
                        <a href="{{ route('proveedor.usuarios.index') }}"
                           class="nav-item flex items-center rounded-lg transition-all {{ Route::is('proveedor.usuarios') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-users nav-icon text-center text-cyan-300"></i>
                            <span class="ml-3">Usuarios</span>
                        </a>
                    @endif

                    <!-- Menú para Profesionales -->
                    @if (session('perfil') === 'profesional')
                        <a href="{{ route('profesional.servicios') }}"
                           class="nav-item flex items-center rounded-lg transition-all {{ Route::is('profesional.servicios') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-cogs nav-icon text-center text-blue-300"></i>
                            <span class="ml-3">Servicios</span>
                        </a>
                    @endif
                </nav>
            </div>
        </aside>

        <!-- Contenido Principal -->
        <main class="flex-1 overflow-auto">
            <!-- Header fijo -->
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="flex justify-between items-center p-4">
                    <h1 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
                    
                    <!-- Barra de búsqueda y perfil -->
                    <div class="flex items-center space-x-4">
                        <div class="relative hidden md:block">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Buscar...">
                        </div>
                        
                        <!-- Notificaciones -->
                        <div class="relative">
                            <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                            </button>
                        </div>
                        
                        <!-- Perfil -->
                        <div class="relative">
                            <button class="flex items-center space-x-2 focus:outline-none">
                                <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="hidden md:inline-block text-sm font-medium">Mi Cuenta</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Contenido dinámico -->
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>