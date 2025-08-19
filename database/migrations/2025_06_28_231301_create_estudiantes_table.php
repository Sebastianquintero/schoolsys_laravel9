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
    Schema::create('estudiantes', function (Blueprint $table) {
        $table->id('id_estudiante');

        // Relación con usuarios
        $table->unsignedBigInteger('fk_usuario')->unique();
        $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');

        // Datos de identificación
        $table->string('tipo_documento', 30); // Cédula, TI, RC
        $table->string('nombres', 100);
        $table->string('apellidos', 100);

        // Dirección
        $table->string('tipo_via', 20); // Calle, carrera, diagonal, etc.
        $table->string('direccion', 150);

        // Nacimiento y edad
        $table->date('fecha_nacimiento');
        $table->integer('edad');

        // Académicos
        $table->string('grado', 50);
        // 🔄 Cambio aquí: usamos una FK en lugar de varchar
        $table->unsignedBigInteger('fk_curso')->nullable();
        $table->foreign('fk_curso')->references('id_curso')->on('cursos')->onDelete('cascade');

        $table->string('nivel_educativo', 30); // Primaria, secundaria, etc.

        // Nacionalidad y contacto
        $table->string('nacionalidad', 50);
        $table->string('telefono', 20);
        $table->string('correo_personal', 100);

        // Familia y salud
        $table->string('acudiente', 100);
        $table->string('eps', 100);
        $table->string('sisben', 50);

        // Relación con colegio
        $table->unsignedBigInteger('fk_colegio')->nullable();
        $table->foreign('fk_colegio')->references('id_colegio')->on('colegios');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
