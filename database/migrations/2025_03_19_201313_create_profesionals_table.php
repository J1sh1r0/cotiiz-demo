<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profesionales', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('profesion');
            $table->string('especialidad')->nullable();
            $table->string('telefono');
            $table->string('correo')->unique();
            $table->string('pais');
            $table->string('estado');
            $table->string('ciudad');
            $table->string('direccion');
            $table->string('codigo_postal');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('cv')->nullable();
            $table->string('titulo_1')->nullable();
            $table->string('titulo_2')->nullable();
            $table->string('ine_1')->nullable();
            $table->string('ine_2')->nullable();
            $table->string('foto')->nullable();
            $table->enum('estatus', ['Aprobado', 'Rechazado', 'Pendiente'])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesionales');
    }
};
