<?php

use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ServicioTecnicoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rutas para Empresas
Route::resource('empresas', EmpresaController::class);
Route::get('/empresas/create', [EmpresaController::class, 'create'])->name('empresas.create');
Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresas.store');

// Rutas para Proveedores
Route::resource('proveedores', ProveedorController::class);
Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');

// Rutas para Servicios Técnicos
Route::resource('solicitudes', SolicitudController::class);
Route::get('/servicios/create', [ServicioTecnicoController::class, 'create'])->name('servicios.create');
Route::post('/servicios', [ServicioTecnicoController::class, 'store'])->name('servicios.store');

// Rutas para Solicitudes
Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('solicitudes.index');
Route::get('/solicitudes/create', [SolicitudController::class, 'create'])->name('solicitudes.create');
Route::post('/solicitudes', [SolicitudController::class, 'store'])->name('solicitudes.store');
Route::delete('/solicitudes/{solicitud}', [SolicitudController::class, 'destroy'])->name('solicitudes.destroy');

