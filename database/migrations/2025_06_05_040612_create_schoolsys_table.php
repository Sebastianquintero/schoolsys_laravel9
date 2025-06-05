<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_rol');
            $table->string('nombre');
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->timestamps();
        });

        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('tipo_documento', 20);
            $table->string('numero_documento', 20);
            $table->string('contrasena', 100);
            $table->date('fecha_nacimiento');
            $table->string('numero_telefono', 11);
            $table->string('correo', 100);
            $table->unsignedBigInteger('fk_rol');

            $table->foreign('fk_rol')->references('id_rol')->on('roles');
        });

        Schema::create('materias', function (Blueprint $table) {
            $table->id('id_materia');
            $table->string('nombre', 100);
            $table->text('descripcion');
            $table->unsignedBigInteger('fk_usuario');

            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios');
        });

        Schema::create('cursos', function (Blueprint $table) {
            $table->id('id_curso');
            $table->unsignedBigInteger('fk_materia');

            $table->foreign('fk_materia')->references('id_materia')->on('materias');
        });

        Schema::create('asistencias', function (Blueprint $table) {
            $table->id('id_asistencia');
            $table->unsignedBigInteger('fk_curso');
            $table->unsignedBigInteger('fk_usuario');
            $table->date('fecha_asistencia');
            $table->boolean('estado');

            $table->foreign('fk_curso')->references('id_curso')->on('cursos');
            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios');
        });

        Schema::create('actividades', function (Blueprint $table) {
            $table->id('id_actividad');
            $table->unsignedBigInteger('creador');
            $table->unsignedBigInteger('fk_curso');
            $table->string('asunto', 150);
            $table->text('contenido');
            $table->dateTime('fecha_creacion');
            $table->string('archivo_adjunto', 255)->nullable();

            $table->foreign('creador')->references('id_usuario')->on('usuarios');
            $table->foreign('fk_curso')->references('id_curso')->on('cursos');
        });

        Schema::create('mensajes', function (Blueprint $table) {
            $table->id('id_mensaje');
            $table->unsignedBigInteger('remitente');
            $table->unsignedBigInteger('destinatario');
            $table->string('asunto', 150);
            $table->text('contenido');
            $table->dateTime('fecha_creacion');
            $table->dateTime('fecha_envio');
            $table->string('archivo_adjunto', 255)->nullable();

            $table->foreign('remitente')->references('id_usuario')->on('usuarios');
            $table->foreign('destinatario')->references('id_usuario')->on('usuarios');
        });

        Schema::create('comunicados', function (Blueprint $table) {
            $table->id('id_comunicado');
            $table->unsignedBigInteger('remitente');
            $table->unsignedBigInteger('destinatario');
            $table->string('asunto', 150);
            $table->text('contenido');
            $table->dateTime('fecha_creacion');
            $table->dateTime('fecha_envio');
            $table->string('archivo_adjunto', 255)->nullable();

            $table->foreign('remitente')->references('id_usuario')->on('usuarios');
            $table->foreign('destinatario')->references('id_usuario')->on('usuarios');
        });

        Schema::create('buzones', function (Blueprint $table) {
            $table->id('id_buzon');
            $table->string('nombre_buzon', 100);
            $table->unsignedBigInteger('fk_usuario');
            $table->unsignedBigInteger('fk_mensaje');

            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('fk_mensaje')->references('id_mensaje')->on('mensajes');
        });

        Schema::create('encuestas', function (Blueprint $table) {
            $table->id('id_encuesta');
            $table->string('titulo', 255);
            $table->string('tipo_pregunta', 100);
            $table->text('pregunta');
            $table->text('respuesta');
            $table->unsignedBigInteger('fk_usuario');

            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios');
        });

        Schema::create('votaciones', function (Blueprint $table) {
            $table->id('id_votacion');
            $table->unsignedBigInteger('fk_usuario');
            $table->unsignedBigInteger('fk_encuesta');

            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('fk_encuesta')->references('id_encuesta')->on('encuestas');
        });







    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('usuarios');
        /*Schema::dropIfExists('roles');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('');*/
    }
};
