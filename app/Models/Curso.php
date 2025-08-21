<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $primaryKey = 'id_curso';

    protected $fillable = [
        'fk_colegio',
        'nombre_curso',
        'numero_curso',
        'descripcion',
        'estado'
    ];

    protected $casts = [
        'estado' => 'string',
    ];

    public static $estadosValidos = ['Activo', 'Inactivo'];

    public static function rules()
    {
        return [
            'nombre_curso' => 'required|string|max:100',
            'numero_curso' => 'required|string|max:20',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:' . implode(',', self::$estadosValidos),
        ];
    }



    public function materias()
    {
        return $this->belongsToMany(
            Materia::class,         // Modelo relacionado
            'curso_materias',       // Nombre de la tabla pivote
            'fk_curso',             // FK de este modelo en la pivote
            'fk_materia'            // FK del otro modelo en la pivote
        );
    }
    public function estudiantes()
    {
        return $this->hasMany(
            Estudiante::class,
            'fk_curso',
            'id_curso'
        );
    }

}
