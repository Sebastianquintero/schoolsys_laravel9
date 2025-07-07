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
        // Tabla de calificaciones
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id('id_calificacion');
            $table->unsignedBigInteger('fk_estudiante');
            $table->unsignedBigInteger('fk_materia');
            $table->unsignedBigInteger('fk_usuario'); // Docente que asigna la calificación
            $table->decimal('nota'); // Valores entre 1.0 y 5.0
            $table->text('observacion')->nullable();
            $table->timestamps();

            $table->foreign('fk_estudiante')->references('id_estudiante')->on('estudiantes')->onDelete('cascade');
            $table->foreign('fk_materia')->references('id_materia')->on('materias')->onDelete('cascade');
            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });

        // Tabla de observador
        Schema::create('observador', function (Blueprint $table) {
            $table->id('id_observacion');
            $table->unsignedBigInteger('fk_estudiante');
            $table->unsignedBigInteger('fk_usuario'); // Docente que realiza la observación
            $table->text('falta');
            $table->enum('grado', ['Leve', 'Grave', 'Muy Grave']);
            $table->text('observaciones_adicionales')->nullable();
            $table->timestamps();

            $table->foreign('fk_estudiante')->references('id_estudiante')->on('estudiantes')->onDelete('cascade');
            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observador');
        Schema::dropIfExists('calificaciones');
    }
};
