<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencias';
    protected $primaryKey = 'id_asistencia';
    protected $fillable = ['fk_curso','fk_usuario','fecha_asistencia','estado'];
    protected $casts = [
        'fecha_asistencia' => 'date',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'fk_curso', 'id_curso');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fk_usuario', 'id_usuario');
    }

    // Scope útil
    public function scopeDeCursoFecha($q, $cursoId, $fecha)
    {
        return $q->where('fk_curso', $cursoId)->whereDate('fecha_asistencia', $fecha);
    }
}
