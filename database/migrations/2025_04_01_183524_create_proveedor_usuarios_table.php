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
        Schema::create('proveedor_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('provider-operador');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('passwordshow')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('second_name')->nullable();
            $table->string('second_lastname')->nullable();
            $table->string('workstation')->nullable();
            $table->string('phone')->nullable();
            $table->string('area_work')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('municipality')->nullable();
            $table->string('colony')->nullable();
            $table->string('street')->nullable();
            $table->string('street_number')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('file_gafete')->nullable();
            $table->string('file_gafete2')->nullable();
            $table->string('file_credential')->nullable();
            $table->string('file_credential2')->nullable();
            $table->enum('estatus', ['Aprobado', 'Rechazado', 'Pendiente'])->default('Pendiente');
            $table->enum('perfil', ['Principal', 'Secundario'])->default('Principal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedor_usuarios');
    }
};
