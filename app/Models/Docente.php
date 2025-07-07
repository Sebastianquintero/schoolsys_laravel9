<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $primaryKey = 'id_docente';

    protected $fillable = [
        'fk_usuario',
        'foto',
        'cargo',
        'tipo_contrato',
        'duracion',
        'fecha_inicio',
        'fecha_fin',
        'correo_personal',
        'telefono'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fk_usuario');
    }
}
