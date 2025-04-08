<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();

            // Campos comunes
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado', 'completado'])->default('pendiente');
            $table->enum('tipo', ['producto', 'servicio', 'profesionista']);

            // Relaciones
            $table->foreignId('proveedor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->foreignId('servicio_id')->nullable()->constrained('servicios')->onDelete('set null');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Campos para tipo 'producto'
            $table->string('modelo')->nullable();
            $table->string('nombre')->nullable();
            $table->string('marca')->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('presupuesto', 10, 2)->nullable();
            $table->string('link_drive')->nullable();

            // Campos para tipo 'servicio'
            $table->string('tipo_solicitudServicio')->nullable();
            $table->text('descripcion_servicio')->nullable();
            $table->decimal('presupuesto_servicio', 10, 2)->nullable();

            // Campos para tipo 'profesionista'
            $table->string('trabajo')->nullable();
            $table->text('detalles')->nullable();
            $table->text('conocimientos')->nullable();
            $table->text('cursos')->nullable();
            $table->string('tiempo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
