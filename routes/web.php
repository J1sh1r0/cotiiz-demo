<?php

use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ServicioTecnicoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ProfesionalController;
use App\Http\Controllers\ProveedorUsuariosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SubcuentaController;
use App\Http\Controllers\ProveedorSubcuentaController;
use App\Http\Controllers\ProveedorSolicitudController;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// 🌟 Pantalla de selección de perfil
Route::get('/', function () {
    return view('seleccion_perfil');
})->name('seleccion.perfil');

// 🚀 Guardar selección de perfil y redirigir
Route::post('/seleccionar-perfil', function (Request $request) {
    $perfil = $request->perfil;
    session(['perfil_seleccionado' => $perfil]); // 🔹 Asegurar consistencia en la sesión

    // Verificar que el perfil sea válido antes de redirigir
    $perfilesValidos = ['comprador', 'proveedor', 'profesional'];
    if (!in_array($perfil, $perfilesValidos)) {
        return redirect()->route('seleccion.perfil')->with('error', 'Perfil no válido');
    }

    return redirect()->route($perfil . '.dashboard');
})->name('guardar.perfil');

// 📌 Ruta del dashboard genérico
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// 📌 Rutas específicas por perfil
Route::prefix('comprador')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('comprador.dashboard');

    Route::resource('empresas', EmpresaController::class)->names([
        'index' => 'comprador.empresas',
        'create' => 'comprador.empresas.create',
        'store' => 'comprador.empresas.store',
        'show' => 'comprador.empresas.show',
        'edit' => 'comprador.empresas.edit',
        'update' => 'comprador.empresas.update',
        'destroy' => 'comprador.empresas.destroy',
    ]);

    // Rutas para Solicitudes
    Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('comprador.solicitudes');
    Route::get('/solicitudes/crear', [SolicitudController::class, 'create'])->name('comprador.solicitudes.crear');
    Route::post('/solicitudes', [SolicitudController::class, 'store'])->name('comprador.solicitudes.store');
    Route::get('/solicitudes/{id}/ver', [SolicitudController::class, 'show'])->name('comprador.solicitudes.ver');
    Route::get('/solicitudes/{id}/info', [SolicitudController::class, 'info'])->name('comprador.solicitudes.info');
    Route::get('/solicitudes/{id}/editar', [SolicitudController::class, 'edit'])->name('comprador.solicitudes.editar');
    Route::put('/solicitudes/{id}', [SolicitudController::class, 'update'])->name('comprador.solicitudes.actualizar');
    Route::delete('/solicitudes/{id}', [SolicitudController::class, 'destroy'])->name('comprador.solicitudes.eliminar');
    Route::post('/guardar-solicitud', [SolicitudController::class, 'guardar'])->name('guardar.solicitud');
    Route::get('/solicitudes/{id}/chat', [SolicitudController::class, 'chat']) ->name('comprador.solicitudes.chat');


    // 🚀 Ruta para usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('comprador.usuarios');
    Route::get('/usuarios/crear', [UsuarioController::class, 'create'])->name('comprador.usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('comprador.usuarios.store');
    Route::get('/usuarios/{usuario}/info', [UsuarioController::class, 'show'])->name('comprador.usuarios.show');
    Route::get('/usuarios/{usuario}/editar', [UsuarioController::class, 'edit'])->name('comprador.usuarios.edit');
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('comprador.usuarios.update');
    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('comprador.usuarios.destroy');

    // 🔹 Ruta para subcuentas
    Route::get('/subcuentas', [SubcuentaController::class, 'index'])->name('comprador.subcuentas');
});


Route::prefix('proveedor')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('proveedor.dashboard');
    //Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedor.proveedores');

    Route::resource('proveedores', ProveedorController::class)->names([
        'index' => 'proveedores.proveedores',
        'create' => 'proveedores.create',
        'store' => 'proveedores.store',
        'show' => 'proveedores.show',
        'edit' => 'proveedores.edit',
        'update' => 'proveedores.update',
        'destroy' => 'proveedores.destroy',
    ]);

    // Ruta para Solicitudes
    Route::get('/solicitudes', [ProveedorSolicitudController::class, 'index'])->name('proveedor.solicitudes');
    Route::get('/solicitudes/crear', [ProveedorSolicitudController::class, 'create'])->name('proveedor.solicitudes.crear');
    Route::post('/solicitudes', [ProveedorSolicitudController::class, 'store'])->name('proveedor.solicitudes.store');
    Route::get('/solicitudes/{id}', [ProveedorSolicitudController::class, 'show'])->name('proveedor.solicitudes.ver');

    // Productos
    Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductController::class, 'store'])->name('productos.store');
    Route::get('/productos/{id}', [ProductController::class, 'show'])->name('productos.show');
    Route::get('/productos/{id}/edit', [ProductController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{id}', [ProductController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{id}', [ProductController::class, 'destroy'])->name('productos.destroy');

    Route::get('/servicios', [ServicioController::class, 'index'])->name('Servicio.index');
    Route::get('/servicios/create', [ServicioController::class, 'create'])->name('servicios.create');
    Route::post('/servicios', [ServicioController::class, 'store'])->name('servicios.store');
    Route::get('/servicios/{id}', [ServicioController::class, 'show'])->name('servicios.show');
    Route::get('/servicios/{id}/edit', [ServicioController::class, 'edit'])->name('servicios.edit');
    Route::put('/servicios/{id}', [ServicioController::class, 'update'])->name('servicios.update');
    Route::delete('/servicios/{id}', [ServicioController::class, 'destroy'])->name('Servicio.destroy');
    Route::delete('/servicios/{id}/foto', [ServicioController::class, 'eliminarFoto'])->name('servicios.eliminarFoto');


    Route::get('/profesionales', [ProfesionalController::class, 'index'])->name('profesionales.index');
    Route::get('/profesionales/create', [ProfesionalController::class, 'create'])->name('profesionales.create');
    Route::post('/profesionales', [ProfesionalController::class, 'store'])->name('profesionales.store');
    Route::get('/profesionales/{id}', [ProfesionalController::class, 'show'])->name('profesionales.show');
    Route::get('/profesionales/{id}/edit', [ProfesionalController::class, 'edit'])->name('profesionales.edit');
    Route::put('/profesionales/{id}', [ProfesionalController::class, 'update'])->name('profesionales.update');
    Route::delete('/profesionales/{id}', [ProfesionalController::class, 'destroy'])->name('profesionales.destroy');

    // Ruta para usuarios
    Route::get('/usuarios-proveedor', [ProveedorUsuariosController::class, 'index'])->name('proveedor.usuarios.index');
    Route::get('/usuarios-proveedor/create', [ProveedorUsuariosController::class, 'create'])->name('proveedor.usuarios.create');
    Route::post('/usuarios-proveedor', [ProveedorUsuariosController::class, 'store'])->name('proveedor.usuarios.store');

    // Ruta para subcuentas php artisan make:controller ProveedorSolicitudController --resource
    Route::get('/subcuentas-proveedor', [ProveedorSubcuentaController::class, 'index'])->name('proveedor.subcuentas');
});

Route::prefix('profesional')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('profesional.dashboard');
    Route::get('/servicios', [ServicioTecnicoController::class, 'index'])->name('profesional.servicios');
});

// 📌 Ruta para seleccionar perfil
Route::post('/seleccionar-perfil', function (Request $request) {
    $perfil = $request->input('perfil');
    session(['perfil' => $perfil]);

    return redirect()->route($perfil . '.dashboard');
})->name('guardar.perfil');


// 📦 Ruta para acceder a almacenamiento
Route::get('storage/{path}', function ($path) {
    return response()->file(storage_path('app/public/' . $path));
})->where('path', '.*')->name('storage.local');

// 🔄 Ruta para verificar si Laravel está corriendo
Route::get('up', function () {
    return response()->json(['status' => 'Laravel is running']);
});
