<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estudiante;
use App\Models\Materia;
use App\Models\Usuario;
use App\Models\Curso;
use App\Models\Colegio;

class Calificacion extends Model
{
    protected $table = 'calificacion';
    protected $fillable = [
        'fk_estudiante',
        'fk_materia',
        'fk_usuario',
        'fk_curso',
        'periodo',
        'fk_colegio',
        'jornada',
        'descripcion_nota',
        'nota',
        'observacion'
    ];

    // Relaciones
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'fk_estudiante');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'fk_materia');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fk_usuario');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'fk_curso');
    }

    public function docenteAsignado()
    {
        return $this->belongsTo(Usuario::class, 'fk_docente_asignado');
    }
}
