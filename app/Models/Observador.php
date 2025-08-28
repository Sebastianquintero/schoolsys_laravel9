<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observador extends Model
{
    protected $table = 'observadores';
    protected $primaryKey = 'id_observador';

    protected $fillable = [
        'fk_estudiante','fk_docente','fk_curso','fk_colegio',
        'anio_escolar','fecha','nombre_padre','nombre_madre',
        'nombre_acudiente','observaciones','firma_nombre','firma_path',
    ];

    protected $casts = ['fecha' => 'date'];

    public function estudiante()
    {
        // fk_estudiante -> estudiantes.id_estudiante
        return $this->belongsTo(Estudiante::class, 'fk_estudiante', 'id_estudiante');
    }

    public function docente()
    {
        // fk_docente -> docentes.id_docente
        return $this->belongsTo(Docente::class, 'fk_docente', 'id_docente');
    }

    public function curso()
    {
        // fk_curso -> cursos.id_curso
        return $this->belongsTo(Curso::class, 'fk_curso', 'id_curso');
    }

    public function colegio()
    {
        // fk_colegio -> colegios.id_colegio
        return $this->belongsTo(Colegio::class, 'fk_colegio', 'id_colegio');
    }
    // Scope para año actual (opcional)
    /*public function scopeDelAnio($q, ?string $anio = null) {
        return $q->where('anio_escolar', $anio ?? (method_exists(SchoolYear::class,'current') ? \App\Support\SchoolYear::current() : now()->year));
    }*/
}
