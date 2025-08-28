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
        Schema::table('calificacion', function (Blueprint $table) {
        $table->unsignedBigInteger('fk_docente_asignado')->nullable()->after('fk_materia');

        // Clave foránea si quieres
        $table->foreign('fk_docente_asignado')->references('id_usuario')->on('usuarios')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calificacion', function (Blueprint $table) {
            //
        });
    }
};
