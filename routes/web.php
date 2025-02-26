<?php

use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ServicioTecnicoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// 🌟 Nueva pantalla de selección de perfil
Route::get('/', function () {
    return view('seleccion_perfil');
})->name('seleccion.perfil');

// 📌 Rutas según el perfil seleccionado
Route::middleware(['perfilSeleccionado'])->group(function () {

    // 🔹 Vistas para Compradores/Empresas
    Route::prefix('comprador')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('comprador.dashboard');
        Route::resource('empresas', EmpresaController::class);
        Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('comprador.solicitudes');
    });

    // 🔹 Vistas para Proveedores
    Route::prefix('proveedor')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('proveedor.dashboard');
        Route::resource('proveedores', ProveedorController::class);
        Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('proveedor.solicitudes');
    });

    // 🔹 Vistas para Profesionales
    Route::prefix('profesional')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('profesional.dashboard');
        Route::get('/servicios', [ServicioTecnicoController::class, 'index'])->name('profesional.servicios');
    });

});

// 🚀 Ruta para guardar la selección de perfil
Route::post('/seleccionar-perfil', function (Illuminate\Http\Request $request) {
    session(['perfil' => $request->perfil]);
    return redirect()->route($request->perfil . '.dashboard');
})->name('guardar.perfil');
