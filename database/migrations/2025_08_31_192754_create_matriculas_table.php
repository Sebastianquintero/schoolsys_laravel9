<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id('id_matricula');
            $table->unsignedBigInteger('fk_estudiante');
            $table->unsignedBigInteger('fk_curso');
            $table->string('anio_escolar', 9); // "2025-2026"
            $table->enum('estado', ['regular','retirado','graduado'])->default('regular');
            $table->enum('resultado', ['pendiente','aprobado','reprobado'])->default('pendiente');
            $table->timestamps();

            $table->unique(['fk_estudiante','anio_escolar'], 'matricula_unica_por_anio');

            $table->foreign('fk_estudiante')->references('id_estudiante')->on('estudiantes');
            $table->foreign('fk_curso')->references('id_curso')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
};
