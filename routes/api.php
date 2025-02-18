<?php

use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ServicioTecnicoController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

Route::apiResource('proveedores', ProveedorController::class);
Route::apiResource('empresas', EmpresaController::class);
Route::apiResource('servicios', ServicioTecnicoController::class);
Route::apiResource('solicitudes', SolicitudController::class);
