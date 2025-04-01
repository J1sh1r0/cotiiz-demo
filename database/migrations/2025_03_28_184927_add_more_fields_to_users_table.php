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
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname')->after('id');
            $table->string('second_name')->nullable()->after('firstname');
            $table->string('lastname')->after('second_name');
            $table->string('second_lastname')->nullable()->after('lastname');
            $table->string('phone')->after('email');
            $table->string('passwordshow')->after('password');
            $table->string('workstation')->nullable();
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
