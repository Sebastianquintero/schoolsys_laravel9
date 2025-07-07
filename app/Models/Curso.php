<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $primaryKey = 'id_curso';
    protected $fillable = ['nombre', 'descripcion', 'fk_materia', 'fk_colegio', 'nivel'];

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'fk_materia');
    }

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'fk_curso', 'id_curso');
    }

    public function colegio()
    {
        return $this->belongsTo(Colegio::class, 'fk_colegio');
    }
}
