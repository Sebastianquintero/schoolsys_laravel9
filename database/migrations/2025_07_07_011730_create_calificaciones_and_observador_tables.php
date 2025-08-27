<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabla de calificaciones
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id('id_calificacion');
            $table->unsignedBigInteger('fk_estudiante');
            $table->unsignedBigInteger('fk_materia');
            $table->unsignedBigInteger('fk_usuario'); // Docente que asigna la calificación
            
            // Nota con precisión de 1 decimal (ej: 4.5)
            $table->decimal('nota', 3, 1);
            
            $table->text('observacion')->nullable();
            $table->timestamps();

            // Relaciones
            $table->foreign('fk_estudiante')->references('id_estudiante')->on('estudiantes')->onDelete('cascade');
            $table->foreign('fk_materia')->references('id_materia')->on('materias')->onDelete('cascade');
            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });

        // Tabla de observador
        Schema::create('observadores', function (Blueprint $t) {
            $t->id('id_observador');
            $t->unsignedBigInteger('fk_estudiante');// estudiante observado
            $t->unsignedBigInteger('fk_docente');// usuario que registra (docente o admin)
            $t->unsignedBigInteger('fk_curso'); // curso del estudiante al momento del registro (snapshot)
            $t->unsignedBigInteger('fk_colegio');// colegio (para filtrar)
            $t->string('anio_escolar', 9);// p.ej. 2025-2026
            $t->date('fecha');// fecha del suceso / registro

            // Datos familiares (no obligatorios)
            $t->string('nombre_padre', 120)->nullable();
            $t->string('nombre_madre', 120)->nullable();
            $t->string('nombre_acudiente', 120)->nullable();

            // Contenido
            $t->text('observaciones');

            // Firma: puedes guardar imagen (ruta) o nombre
            $t->string('firma_nombre', 120)->nullable();
            $t->string('firma_path', 255)->nullable(); // si adjuntar imagen de firma

            $t->timestamps();

            // FKs
            $t->foreign('fk_estudiante')->references('id_estudiante')->on('estudiantes')->onDelete('cascade');
            $t->foreign('fk_docente')->references('id_usuario')->on('usuarios');
            $t->foreign('fk_curso')->references('id_curso')->on('cursos');
            $t->foreign('fk_colegio')->references('id_colegio')->on('colegios');

            // Para búsquedas rápidas
            $t->index(['fk_colegio', 'anio_escolar']);
            $t->index(['fk_estudiante', 'fecha']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('observadores');
        Schema::dropIfExists('calificaciones');
    }
};
