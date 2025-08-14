<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id('id_anuncio');
            $table->unsignedBigInteger('fk_colegio');         // a qué colegio aplica
            $table->unsignedBigInteger('created_by');         // admin que lo creó
            $table->string('titulo', 150);
            $table->text('descripcion');
            $table->date('fecha');                            // fecha que quieres mostrar
            $table->string('imagen_path', 255)->nullable();   // storage path
            $table->boolean('publicado')->default(true);
            $table->timestamps();

            $table->foreign('fk_colegio')->references('id_colegio')->on('colegios')->onDelete('cascade');
            $table->foreign('created_by')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anuncios');
    }
};
