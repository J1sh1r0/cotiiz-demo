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
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
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
        @media (max-width: 768px) {
            .compact-items-sidebar {
                transform: translateX(-100%);
                position: fixed;
                height: 100vh;
                z-index: 50;
            }
            .compact-items-sidebar.mobile-show {
                transform: translateX(0);
            }
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0,0,0,0.5);
                z-index: 40;
            }
            .overlay.active {
                display: block;
            }
        }
        
        /* Nuevos estilos para el fondo */
        .main-content-area {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px 0 0 0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }
        
        @media (max-width: 768px) {
            .main-content-area {
                border-radius: 0;
            }
        }
    </style>
</head>

<body class="min-h-screen">

    <!-- Contenedor principal -->
    <div class="flex h-screen">

        <!-- Sidebar con elementos compactos -->
        <aside class="compact-items-sidebar bg-gradient-to-b from-gray-800 to-gray-900 text-white shadow-xl" id="sidebar">
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

        <!-- Overlay para móvil -->
        <div class="overlay" id="overlay"></div>

        <!-- Contenido Principal -->
        <main class="flex-1 overflow-auto main-content-area">
            <!-- Header fijo -->
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="container mx-auto px-4">
                    <div class="flex justify-between items-center py-3">
                        
                        <!-- Botón de menú para móvil -->
                        <button id="mobile-menu-button" class="md:hidden text-gray-600 hover:text-blue-600 focus:outline-none">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
            
                        <!-- Contenedor de acciones de usuario alineado a la derecha -->
                        <div class="flex items-center space-x-6 ml-auto">
                            <!-- Botón de notificaciones -->
                            <div class="relative">
                                <button 
                                    aria-label="Notificaciones" 
                                    class="text-gray-600 hover:text-blue-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-full p-1"
                                >
                                    <i class="fas fa-bell text-xl" aria-hidden="true"></i>
                                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center animate-pulse">3</span>
                                </button>
                            </div>
            
                            <!-- Menú de perfil desplegable -->
                            <div class="relative" x-data="{ open: false }">
                                <button 
                                    @click="open = !open"
                                    @keydown.escape="open = false"
                                    aria-label="Menú de usuario"
                                    aria-haspopup="true"
                                    :aria-expanded="open"
                                    class="flex items-center space-x-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-full p-1"
                                >
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white shadow-sm">
                                        <i class="fas fa-user" aria-hidden="true"></i>
                                    </div>
                                    <span class="hidden md:inline-block text-sm font-medium text-gray-700">{{ ucfirst(session('perfil', 'No seleccionado')) }}</span>
                                    <i class="fas fa-chevron-down text-xs text-gray-500 transition-transform duration-200" :class="{'transform rotate-180': open}"></i>
                                </button>
            
                                <!-- Menú desplegable -->
                                <div 
                                    x-show="open"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95"
                                    @click.outside="open = false"
                                    class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20 border border-gray-100"
                                    style="display: none;"
                                >
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Perfil</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Configuración</a>
                                    <div class="border-t border-gray-200 my-1"></div>
                                    <a href="{{ route('seleccion.perfil') }}" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Cerrar sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>            
            
            <!-- Contenido principal -->
            <div class="container mx-auto px-4 py-6">
              @yield('content')
            </div>
          </main>
        
    </div>
</body>

</html>
<script src="//unpkg.com/alpinejs" defer></script>
<script>
    // Control del menú móvil
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        
        mobileMenuButton.addEventListener('click', function() {
            sidebar.classList.toggle('mobile-show');
            overlay.classList.toggle('active');
        });
        
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('mobile-show');
            overlay.classList.remove('active');
        });
        
        // Cerrar menú al hacer clic en un enlace (para móviles)
        const navLinks = document.querySelectorAll('.compact-items-sidebar nav a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 768) {
                    sidebar.classList.remove('mobile-show');
                    overlay.classList.remove('active');
                }
            });
        });
    });
</script>