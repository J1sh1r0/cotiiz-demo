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
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->softDeletes(); // Agrega la columna deleted_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
