<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliticasTable extends Migration
{
    /**
     * Ejecuta la migración.
     */
    public function up()
    {
        Schema::create('politicas', function (Blueprint $table) {
            $table->id('id_politica');           
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Revierte la migración.
     */
    public function down()
    {
        Schema::dropIfExists('politicas');
    }
}
