<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Calificacion;
use App\Models\Curso;
use App\Models\Materia;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteNotasController extends Controller
{
    public function misCalificaciones()
    {
        $usuarioId = Auth::id();

        $estudiante = Estudiante::where('fk_usuario', $usuarioId)->firstOrFail();

        $curso = Curso::with('materias')->findOrFail($estudiante->fk_curso);

        $calificaciones = Calificacion::where('fk_estudiante', $estudiante->id_estudiante)
            ->join('materias', 'calificaciones.fk_materia', '=', 'materias.id_materia')
            ->select(
                'calificaciones.*',
                'materias.nombre as nombre_materia'
            )
            ->orderBy('periodo')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('estudiante.calificaciones.calificaciones', compact('calificaciones', 'estudiante', 'curso'));
    }
}
