<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $fillable = [
        'direccion',
        'tipo_via',
        'fecha_nacimiento',
        'edad',
        'grado',
        'curso',
        'nivel_educativo',
        'nacionalidad',
        'telefono',
        'correo_personal',
        'acudiente',
        'eps',
        'sisben',
        'fk_usuario'
    ];
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fk_usuario', 'id_usuario');
    }
}
