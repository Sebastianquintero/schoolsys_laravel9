<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;

class Materia extends Model
{
    //use HasFactory;
    protected $table = 'materias';
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
            'fk_materia',
            'fk_curso'
        )->withTimestamps();
    }

    // Una materia pertenece a un docente
    public function docente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'fk_docente', 'id_usuario');
    }

    // Una materia puede estar en varios cursos
    public function cursosAsociados(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Curso::class, 'curso_materias', 'fk_materia', 'fk_curso');
    }


}
