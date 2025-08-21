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
        Schema::create('colegios', function (Blueprint $table) {
            $table->id('id_colegio');
            $table->string('nombre');
            $table->string('direccion')->nullable();
            $table->timestamps();
        });

        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('foto_path', 255)->nullable();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('tipo_documento', 20);
            $table->string('numero_documento', 20);
            $table->string('contrasena', 100);
            $table->date('fecha_nacimiento');
            $table->string('numero_telefono', 11);
            $table->string('correo', 100);
            $table->unsignedBigInteger('fk_rol');
            $table->unsignedBigInteger('fk_colegio')->nullable();
            $table->timestamps();

            $table->foreign('fk_colegio')->references('id_colegio')->on('colegios');
            $table->foreign('fk_rol')->references('id_rol')->on('roles');



        });

        Schema::create('materias', function (Blueprint $table) {
            $table->id('id_materia');
            $table->string('nombre', 100);
            $table->text('descripcion');
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
            $table->timestamps();
        });

        Schema::create('cursos', function (Blueprint $table) {
            $table->id('id_curso');

            $table->unsignedBigInteger('fk_colegio')->nullable();
            $table->string('nombre_curso', 100);
            $table->string('numero_curso', 20);
            $table->string('descripcion', 255)->nullable();
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
            $table->timestamps();

            $table->foreign('fk_colegio')->references('id_colegio')->on('colegios')->onDelete('cascade');

            // índice único compuesto (usa un NOMBRE de índice, no un número)
            $table->unique(['fk_colegio', 'numero_curso'], 'cursos_colegio_numero_unique');

        });


        Schema::create('curso_materias', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_curso');
            $table->unsignedBigInteger('fk_materia');
            $table->timestamps();

            $table->primary(['fk_curso', 'fk_materia']);

            $table->foreign('fk_curso')->references('id_curso')->on('cursos')->onDelete('cascade');
            $table->foreign('fk_materia')->references('id_materia')->on('materias')->onDelete('cascade');
            
        });



        Schema::create('asistencias', function (Blueprint $table) {
            $table->id('id_asistencia');
            $table->unsignedBigInteger('fk_curso');
            $table->unsignedBigInteger('fk_usuario');
            $table->date('fecha_asistencia');
            $table->boolean('estado');
            $table->timestamps();

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
            $table->timestamps();

            $table->foreign('creador')->references('id_usuario')->on('usuarios');
            $table->foreign('fk_curso')->references('id_curso')->on('cursos');
        });

        Schema::create('mensajes', function (Blueprint $table) {
            $table->id('id_mensaje');
            $table->unsignedBigInteger('remitente');
            $table->unsignedBigInteger('destinatario');
            $table->string('asunto', 150);
            $table->text('contenido');
            $table->boolean('leido')->default(false);
            $table->dateTime('fecha_creacion');
            $table->dateTime('fecha_envio');
            $table->string('archivo_adjunto', 255)->nullable();
            $table->timestamps();

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
            $table->timestamps();

            $table->foreign('remitente')->references('id_usuario')->on('usuarios');
            $table->foreign('destinatario')->references('id_usuario')->on('usuarios');
        });

        Schema::create('buzones', function (Blueprint $table) {
            $table->id('id_buzon');
            $table->string('nombre_buzon', 100);
            $table->unsignedBigInteger('fk_usuario');
            $table->unsignedBigInteger('fk_mensaje');
            $table->timestamps();

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
            $table->timestamps();

            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios');
        });

        Schema::create('votaciones', function (Blueprint $table) {
            $table->id('id_votacion');
            $table->unsignedBigInteger('fk_usuario');
            $table->unsignedBigInteger('fk_encuesta');
            $table->timestamps();

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
