<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\Materia;
use App\Models\Calificacion;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;


class NotasController extends Controller
{

    public function verNotas($estudianteId)
    {
        // Obtener el estudiante
        $estudiante = Estudiante::findOrFail($estudianteId);
        
        // Obtener el curso del estudiante
        $curso = Curso::findOrFail($estudiante->fk_curso);
        
        // Obtener las materias asignadas al curso
        $materias = Materia::where('fk_curso', $estudiante->fk_curso)
                          ->where('fk_colegio', $estudiante->fk_colegio)
                          ->get();
        
        // Obtener todas las calificaciones del estudiante organizadas por materia
        $calificacionesPorMateria = [];
        
        foreach ($materias as $materia) {
            $calificaciones = Calificacion::where('fk_estudiante', $estudianteId)
                                        ->where('fk_materia', $materia->id_materia)
                                        ->orderBy('periodo', 'asc')
                                        ->orderBy('created_at', 'desc')
                                        ->get();
            
            if ($calificaciones->count() > 0) {
                $calificacionesPorMateria[$materia->id_materia] = [
                    'materia' => $materia,
                    'calificaciones' => $calificaciones,
                    'promedio' => $calificaciones->avg('nota')
                ];
            }
        }
        
        return view('estudiantes.ver-notas', compact(
            'estudiante', 
            'curso', 
            'materias', 
            'calificacionesPorMateria'
        ));
    }
    
    public function obtenerNotasMateria(Request $request)
    {
        $estudianteId = $request->estudiante_id;
        $materiaId = $request->materia_id;
        
        $calificaciones = Calificacion::where('fk_estudiante', $estudianteId)
                                    ->where('fk_materia', $materiaId)
                                    ->with(['usuario' => function($query) {
                                        $query->select('id', 'name');
                                    }])
                                    ->orderBy('periodo', 'asc')
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        
        return response()->json([
            'success' => true,
            'calificaciones' => $calificaciones
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function show(Notas $notas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function edit(Notas $notas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notas $notas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notas $notas)
    {
        //
    }
}
