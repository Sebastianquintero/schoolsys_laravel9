<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasActivityLog;

class Estudiante extends Model
{   
    use HasActivityLog;

    // Opcional: nombre de canal en el log
    protected $logName = 'estudiantes';

    // Campos que quieres auditar
    protected array $activityLogAttributes = [
        'fk_usuario',
        'fk_curso',
        'direccion',
        'edad',
        'grado',
        'nivel_educativo',
        'telefono',
        'correo_personal',
        'fk_colegio',
    ];


    protected $table = 'estudiantes';
    protected $primaryKey = 'id_estudiante';
    public $incrementing = true; // id_estudiante es autoincremental
    protected $fillable = [
        'direccion',
        'tipo_via',
        'fecha_nacimiento',
        'edad',
        'grado',
        'fk_curso',
        'nivel_educativo',
        'nacionalidad',
        'telefono',
        'correo_personal',
        'acudiente',
        'eps',
        'sisben',
        'fk_usuario',
        'fk_colegio'
    ];

    


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fk_usuario', 'id_usuario');
    }

    public function colegio()
    {
        return $this->belongsTo(Colegio::class, 'fk_colegio', 'id_colegio');
    }
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'fk_curso', 'id_curso');
    }
    public function matriculas() 
    { 
        return $this->hasMany(Matricula::class, 'fk_estudiante', 'id_estudiante'); 
    }


}
