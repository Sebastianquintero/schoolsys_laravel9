<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    //use HasFactory;
    protected $primaryKey = 'id_materia';

    protected $fillable = [
        'nombre',
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
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:' . implode(',', self::$estadosValidos),
        ];
    }

    public function cursos()
    {
        return $this->belongsToMany(
            Curso::class,
            'curso_materias',
            'id_materia',
            'id_curso'
        );
    }


}
