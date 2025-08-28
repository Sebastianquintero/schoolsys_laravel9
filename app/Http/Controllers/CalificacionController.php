<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Usuario;
use App\Models\Estudiante;

class CalificacionController extends Controller
{

    // Muestra los cursos asignados al docente autenticado
    public function cursosAsignados()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        $usuario = auth()->user();

        if ($usuario->fk_rol == '1') {
            $cursos = Curso::all();
        } else {
            $cursos = $usuario->materiasDictadas()
                ->with('cursosAsociados')
                ->get()
                ->pluck('cursosAsociados')
                ->flatten()
                ->unique('id_curso');
        }

        return view('admin_crud.admin_calificaciones.lista_cursos', compact('cursos'));
    }

    // NUEVO MÉTODO para mostrar estudiantes del curso
    public function mostrarEstudiantes($fk_curso)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        // Buscar el curso
        $curso = Curso::findOrFail($fk_curso);
        // Obtener estudiantes del curso
        $estudiantes = Estudiante::with('usuario')
            ->where('fk_curso', $fk_curso)
            ->get();

        return view('admin_crud.admin_calificaciones.lista_estudiantes', compact('curso', 'estudiantes'));
    }


    public function crearCalificacion($cursoId, $estudianteId)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión');
    }

    // Obtener datos necesarios
    $curso = Curso::findOrFail($cursoId);
    $estudiante = Estudiante::findOrFail($estudianteId); // O Usuario::findOrFail($estudianteId) si están en usuarios
    
    // Obtener materias del curso (según tu relación many-to-many)
    $materias = $curso->materias; // Ajusta según tu relación
    
    // Si no tienes la relación, usa esto:
    // $materias = Materia::whereHas('cursos', function($query) use ($cursoId) {
    //     $query->where('curso_id', $cursoId);
    // })->get();

    return view('admin_crud.admin_calificaciones.crear_calificacion', 
               compact('curso', 'estudiante', 'materias'));
}

public function guardarCalificacion(Request $request)
{
    $request->validate([
        'fk_estudiante' => 'required|exists:estudiantes,id_estudiante', // Cambiar aquí
        'fk_materia' => 'required|exists:materias,id_materia', // Verifica si es id o id_materia
        'fk_usuario' => 'required|exists:usuarios,id_usuario', // Cambiar aquí
        'fk_curso' => 'required|exists:cursos,id_curso', // Cambiar aquí
        'periodo' => 'required|integer|between:1,4',
        'fk_colegio' => 'required|exists:colegios,id_colegio',
        'jornada' => 'required|in:Diurna,Tarde',
        'descripcion_nota' => 'required|string|max:255',
        'nota' => 'required|numeric|between:0,5',
        'observacion' => 'nullable|string'
    ]);

    Calificacion::create([
        'fk_estudiante' => $request->fk_estudiante,
        'fk_materia' => $request->fk_materia,
        'fk_usuario' => auth()->id(), // Usuario que califica (docente)
        'fk_curso' => $request->fk_curso,
        'periodo' => $request->periodo,
        'fk_colegio' => auth()->user()->fk_colegio, // Colegio del docente autenticado
        'jornada' => $request->jornada,
        'descripcion_nota' => $request->descripcion_nota,
        'nota' => $request->nota,
        'observacion' => $request->observacion
    ]);

    return redirect()
        ->route('calificaciones.cursos', $request->fk_curso)
        ->with('success', 'Calificación guardada exitosamente');
}

















    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin_crud.admin_calificaciones.lista_cursos");
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
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Calificacion $calificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Calificacion $calificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calificacion $calificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificacion $calificacion)
    {
        //
    }
}
