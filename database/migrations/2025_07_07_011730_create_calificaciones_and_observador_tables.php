<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Tabla de calificaciones
        Schema::create('calificacion', function (Blueprint $table) {
            $table->id('id_calificacion');
            $table->unsignedBigInteger('fk_estudiante');
            $table->unsignedBigInteger('fk_materia');
            $table->unsignedBigInteger('fk_usuario'); // Docente que asigna la calificación
            $table->unsignedBigInteger('fk_curso');
            $table->unsignedBigInteger('fk_colegio');
            $table->enum('periodo', ['1', '2', '3', '4']);
            $table->enum('jornada', ['Diurna', 'Tarde']);
            $table->string('descripcion_nota', 255);
            // Nota con precisión de 2 decimal (Ejemplo - 0.00 - 5.00)
            $table->decimal('nota', 3, 2);
            $table->text('observacion')->nullable();
            $table->timestamps();

            // Relaciones
            $table->foreign('fk_estudiante')->references('id_estudiante')->on('estudiantes')->onDelete('cascade');
            $table->foreign('fk_materia')->references('id_materia')->on('materias')->onDelete('cascade');
            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('fk_curso')->references('id_curso')->on('cursos')->onDelete('cascade');
            $table->foreign('fk_colegio')->references('id_colegio')->on('colegios')->onDelete('cascade');
        });

        // Tabla de observador
        Schema::create('observadores', function (Blueprint $table) {
            $table->id('id_observacion');
            $table->unsignedBigInteger('fk_estudiante');
            $table->unsignedBigInteger('fk_usuario'); // Docente que realiza la observación

            $table->text('falta');
            $table->enum('grado', ['Leve', 'Grave', 'Muy Grave']);
            $table->text('observaciones_adicionales')->nullable();
            $table->timestamps();

            // Relaciones
            $table->foreign('fk_estudiante')->references('id_estudiante')->on('estudiantes')->onDelete('cascade');
            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });

        Schema::create('curso_docente_materia', function (Blueprint $table) {
            $table->id('id_asignacion');

            $table->unsignedBigInteger('fk_curso');
            $table->unsignedBigInteger('fk_docente');
            $table->unsignedBigInteger('fk_materia');

            $table->timestamps();

            $table->foreign('fk_curso')->references('id_curso')->on('cursos')->onDelete('cascade');
            $table->foreign('fk_docente')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('fk_materia')->references('id_materia')->on('materias')->onDelete('cascade');

            $table->unique(['fk_curso', 'fk_docente', 'fk_materia']); // evita duplicados
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('observadores');
        Schema::dropIfExists('calificacion');
        Schema::dropIfExists('curso_docente_materia');
    }
};
