<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $primaryKey = 'id_curso';

    protected $fillable = [
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
}
