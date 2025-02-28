<?php

use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ServicioTecnicoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SubcuentaController;
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

    // 📌 Rutas para Solicitudes
    Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('comprador.solicitudes');
    Route::get('/solicitudes/crear', [SolicitudController::class, 'create'])->name('comprador.solicitudes.crear');
    Route::post('/solicitudes', [SolicitudController::class, 'store'])->name('comprador.solicitudes.store');
    Route::get('/solicitudes/{id}', [SolicitudController::class, 'show'])->name('comprador.solicitudes.ver');

    // 🚀 Ruta para usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('comprador.usuarios');

    // 🔹 Ruta para subcuentas
    Route::get('/subcuentas', [SubcuentaController::class, 'index'])->name('comprador.subcuentas');
});


Route::prefix('proveedor')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('proveedor.dashboard');
    Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedor.proveedores'); // 🔹 Nueva ruta
    Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('proveedor.solicitudes');
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
