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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuarios');
            $table->unsignedBigInteger('id_rol')->default(1);
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('email', 100)->unique();
            $table->string('telefono', 15);
            $table->string('password', 255);
            $table->string('remember_token', 100)->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->boolean('two_factor_authentication')->nullable();
            $table->timestamps();
        
            $table->foreign('id_rol')->references('id_rol')->on('roles');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
