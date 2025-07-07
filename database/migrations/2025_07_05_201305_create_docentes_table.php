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
        Schema::create('docentes', function (Blueprint $table) {
           $table->id('id_docente');

            $table->unsignedBigInteger('fk_usuario')->unique();
            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            


            $table->string('foto')->nullable(); // Ruta o nombre del archivo
            $table->string('cargo', 100);       // Ej: Docente, Coordinador, etc.
            $table->string('tipo_contrato', 50); // Ej: Fijo, Temporal, Prestación de servicios
            $table->string('duracion', 50);     // Ej: 1 año, 6 meses
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('correo_personal', 100);
            //$table->string('telefono', 20)->nullable(); // opcional si quieres sobrescribir

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes');
    }
};
