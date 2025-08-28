<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Usuario;
use App\Models\Estudiante;
use Illuminate\Support\Facades\DB;

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
            $cursos = Curso::orderBy('numero_curso', 'asc')->get();
        } else {
            $cursos = $usuario->materiasDictadas()
                ->with([
                    'cursosAsociados' => function ($query) {
                        $query->orderBy('numero_curso', 'asc');
                    }
                ])
                ->get()
                ->pluck('cursosAsociados')
                ->flatten()
                ->unique('id_curso')
                ->sortBy('numero_curso') // orden final después de flatten
                ->values(); // reindexar
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
        $curso = Curso::findOrFail($cursoId);
        $estudiante = Estudiante::findOrFail($estudianteId);

        $materias = $curso->materias;

        // Obtener docentes asignados por materia en este curso
        $docentesAsignados = DB::table('curso_docente_materia')
            ->join('usuarios', 'usuarios.id_usuario', '=', 'curso_docente_materia.fk_docente')
            ->where('curso_docente_materia.fk_curso', $cursoId)
            ->select('curso_docente_materia.fk_materia', 'usuarios.nombres', 'usuarios.apellidos')
            ->get()
            ->groupBy('fk_materia'); // agrupamos por materia

        return view('admin_crud.admin_calificaciones.crear_calificacion', compact(
            'curso',
            'estudiante',
            'materias',
            'docentesAsignados'
        ));
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
        // Buscar el docente asignado a esa materia y curso
        $asignacion = DB::table('curso_docente_materia')
            ->where('fk_materia', $request->fk_materia)
            ->where('fk_curso', $request->fk_curso)
            ->first();

        $docenteAsignadoId = $asignacion ? $asignacion->fk_docente : null;

        Calificacion::create([
            'fk_estudiante' => $request->fk_estudiante,
            'fk_materia' => $request->fk_materia,
            'fk_usuario' => auth()->id(), // quien califica
            'fk_docente_asignado' => $docenteAsignadoId, // el docente asignado real
            'fk_curso' => $request->fk_curso,
            'periodo' => $request->periodo,
            'fk_colegio' => auth()->user()->fk_colegio,
            'jornada' => $request->jornada,
            'descripcion_nota' => $request->descripcion_nota,
            'nota' => $request->nota,
            'observacion' => $request->observacion
        ]);

        return redirect()
            ->route('calificaciones.cursos', $request->fk_curso)
            ->with('success', 'Calificación guardada exitosamente');
    }

    public function obtenerDocenteAsignado(Request $request)
    {
        $cursoId = $request->fk_curso;
        $materiaId = $request->fk_materia;

        $docente = DB::table('curso_docente_materia')
            ->join('usuarios', 'usuarios.id_usuario', '=', 'curso_docente_materia.fk_docente')
            ->where('fk_curso', $cursoId)
            ->where('fk_materia', $materiaId)
            ->select('usuarios.nombres', 'usuarios.apellidos')
            ->first();

        if ($docente) {
            return response()->json([
                'success' => true,
                'nombre' => $docente->nombres . ' ' . $docente->apellidos
            ]);
        }

        return response()->json(['success' => false, 'nombre' => 'No asignado']);
    }

}
