<?php

use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ServicioTecnicoController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para Empresas
Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index');
Route::get('/empresas/create', [EmpresaController::class, 'create'])->name('empresas.create');
Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresas.store');

// Rutas para Proveedores
Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');

// Rutas para Servicios Técnicos
Route::get('/servicios', [ServicioTecnicoController::class, 'index'])->name('servicios.index');
Route::get('/servicios/create', [ServicioTecnicoController::class, 'create'])->name('servicios.create');
Route::post('/servicios', [ServicioTecnicoController::class, 'store'])->name('servicios.store');

// Rutas para Solicitudes
Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('solicitudes.index');
Route::get('/solicitudes/create', [SolicitudController::class, 'create'])->name('solicitudes.create');
Route::post('/solicitudes', [SolicitudController::class, 'store'])->name('solicitudes.store');
