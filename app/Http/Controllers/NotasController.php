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
use Barryvdh\DomPDF\Facade\Pdf;


class NotasController extends Controller
{

    public function verNotas($estudianteId)
    {
        // Obtener el estudiante
        $estudiante = Estudiante::findOrFail($estudianteId);
        // Obtener las materias asignadas al curso
        $curso = Curso::with('materias')->findOrFail($estudiante->fk_curso);
        $materias = $curso->materias;


        // Agrupar calificaciones por período
        $calificacionesPorPeriodo = [];

        foreach ($materias as $materia) {
            $calificaciones = Calificacion::where('fk_estudiante', $estudianteId)
                ->where('fk_materia', $materia->id_materia)
                ->with('usuario')
                ->orderBy('periodo')
                ->orderBy('created_at', 'desc')
                ->get();

            // Obtener el docente asignado a esta materia y curso UNA VEZ
            $asignacion = DB::table('curso_docente_materia')
                ->join('usuarios', 'usuarios.id_usuario', '=', 'curso_docente_materia.fk_docente')
                ->where('curso_docente_materia.fk_curso', $curso->id_curso)
                ->where('curso_docente_materia.fk_materia', $materia->id_materia)
                ->select('usuarios.nombres', 'usuarios.apellidos')
                ->first();

            $docenteAsignado = $asignacion
                ? $asignacion->nombres . ' ' . $asignacion->apellidos
                : 'No asignado';

            foreach ($calificaciones as $calificacion) {
                $periodo = $calificacion->periodo;

                $calificacionesPorPeriodo[$periodo]['materias'][$materia->id_materia]['materia'] = $materia;
                $calificacionesPorPeriodo[$periodo]['materias'][$materia->id_materia]['docente'] = $docenteAsignado;
                $calificacionesPorPeriodo[$periodo]['materias'][$materia->id_materia]['notas'][] = $calificacion;
            }
        }


        // Calcular promedio por período
        foreach ($calificacionesPorPeriodo as $periodo => &$data) {
            $total = 0;
            $count = 0;

            foreach ($data['materias'] as $info) {
                $notas = collect($info['notas'])->pluck('nota');
                $promedioMateria = $notas->avg();
                $data['materias'][$info['materia']->id_materia]['promedio'] = $promedioMateria;

                $total += $promedioMateria;
                $count++;
            }

            $data['promedio_periodo'] = $count > 0 ? round($total / $count, 2) : null;
        }

        // Calcular promedio general sobre los promedios de los períodos
        $promedioGeneral = collect($calificacionesPorPeriodo)->pluck('promedio_periodo')->filter()->avg();

        return view('admin_crud.admin_calificaciones.ver_notas', compact(
            'estudiante',
            'curso',
            'calificacionesPorPeriodo',
            'promedioGeneral'
        ));
    }

    public function obtenerNotasMateria(Request $request)
    {
        $estudianteId = $request->estudiante_id;
        $materiaId = $request->materia_id;

        $calificaciones = Calificacion::where('fk_estudiante', $estudianteId)
            ->where('fk_materia', $materiaId)
            ->with([
                'usuario' => function ($query) {
                    $query->select('id', 'name');
                }
            ])
            ->orderBy('periodo', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'calificaciones' => $calificaciones
        ]);
    }

    public function verNotasPDF($estudianteId)
    {
        $estudiante = Estudiante::findOrFail($estudianteId);
        $curso = Curso::with('materias')->findOrFail($estudiante->fk_curso);
        $materias = $curso->materias;

        $calificacionesPorPeriodo = [];

        foreach ($materias as $materia) {
            $calificaciones = Calificacion::where('fk_estudiante', $estudianteId)
                ->where('fk_materia', $materia->id_materia)
                ->with('docenteAsignado')
                ->orderBy('periodo')
                ->orderBy('created_at', 'desc')
                ->get();

            // Buscar el docente asignado a la materia en este curso
            $asignacion = DB::table('curso_docente_materia')
                ->join('usuarios', 'usuarios.id_usuario', '=', 'curso_docente_materia.fk_docente')
                ->where('fk_curso', $curso->id_curso)
                ->where('fk_materia', $materia->id_materia)
                ->select('usuarios.nombres', 'usuarios.apellidos')
                ->first();

            $docenteAsignado = $asignacion
                ? $asignacion->nombres . ' ' . $asignacion->apellidos
                : 'No asignado';

            foreach ($calificaciones as $calificacion) {
                $periodo = $calificacion->periodo;

                $calificacionesPorPeriodo[$periodo]['materias'][$materia->id_materia]['materia'] = $materia;
                $calificacionesPorPeriodo[$periodo]['materias'][$materia->id_materia]['docente'] = $docenteAsignado;
                $calificacionesPorPeriodo[$periodo]['materias'][$materia->id_materia]['notas'][] = $calificacion;
            }
        }

        foreach ($calificacionesPorPeriodo as $periodo => &$data) {
            $total = 0;
            $count = 0;

            foreach ($data['materias'] as $info) {
                $notas = collect($info['notas'])->pluck('nota');
                $promedioMateria = $notas->avg();
                $data['materias'][$info['materia']->id_materia]['promedio'] = $promedioMateria;

                $total += $promedioMateria;
                $count++;
            }

            $data['promedio_periodo'] = $count > 0 ? round($total / $count, 2) : null;
        }

        $promedioGeneral = collect($calificacionesPorPeriodo)->pluck('promedio_periodo')->filter()->avg();

        $pdf = Pdf::loadView('admin_crud.admin_calificaciones.notas_pdf', [
            'estudiante' => $estudiante,
            'curso' => $curso,
            'calificacionesPorPeriodo' => $calificacionesPorPeriodo,
            'promedioGeneral' => $promedioGeneral,
        ]);

        return $pdf->download('notas_' . $estudiante->nombres . '.pdf');
    }

    /**
     * Descargar PDF con todas las notas de todos los estudiantes del curso
     */
    public function pdfNotasCurso($cursoId)
    {
        $cursoObj = Curso::with(['materias', 'estudiantes.usuario'])->findOrFail($cursoId);
        $materias = $cursoObj->materias;
        $estudiantes = $cursoObj->estudiantes;
        $notasCurso = [];
        foreach ($estudiantes as $estudiante) {
            $calificacionesPorPeriodo = [];
            foreach ($materias as $materia) {
                $calificaciones = Calificacion::where('fk_estudiante', $estudiante->id_estudiante)
                    ->where('fk_materia', $materia->id_materia)
                    ->orderBy('periodo')
                    ->orderBy('created_at', 'desc')
                    ->get();
                $asignacion = DB::table('curso_docente_materia')
                    ->join('usuarios', 'usuarios.id_usuario', '=', 'curso_docente_materia.fk_docente')
                    ->where('fk_curso', $cursoObj->id_curso)
                    ->where('fk_materia', $materia->id_materia)
                    ->select('usuarios.nombres', 'usuarios.apellidos')
                    ->first();
                $docenteAsignado = $asignacion
                    ? $asignacion->nombres . ' ' . $asignacion->apellidos
                    : 'No asignado';
                foreach ($calificaciones as $calificacion) {
                    $periodo = $calificacion->periodo;
                    $calificacionesPorPeriodo[$periodo]['materias'][$materia->id_materia]['materia'] = $materia;
                    $calificacionesPorPeriodo[$periodo]['materias'][$materia->id_materia]['docente'] = $docenteAsignado;
                    $calificacionesPorPeriodo[$periodo]['materias'][$materia->id_materia]['notas'][] = $calificacion;
                }
            }
            foreach ($calificacionesPorPeriodo as $periodo => &$data) {
                $total = 0;
                $count = 0;
                foreach ($data['materias'] as $info) {
                    $notas = collect($info['notas'])->pluck('nota');
                    $promedioMateria = $notas->avg();
                    $data['materias'][$info['materia']->id_materia]['promedio'] = $promedioMateria;
                    $total += $promedioMateria;
                    $count++;
                }
                $data['promedio_periodo'] = $count > 0 ? round($total / $count, 2) : null;
            }
            $promedioGeneral = collect($calificacionesPorPeriodo)->pluck('promedio_periodo')->filter()->avg();
            $notasCurso[] = [
                'estudiante' => $estudiante,
                'calificacionesPorPeriodo' => $calificacionesPorPeriodo,
                'promedioGeneral' => $promedioGeneral,
            ];
        }
        $pdf = Pdf::loadView('admin_crud.admin_calificaciones.notas_pdf_curso', [
            'curso' => $cursoObj,
            'notasCurso' => $notasCurso,
        ]);
        return $pdf->download('notas_curso_' . $cursoObj->nombre_curso . '.pdf');
    }

}
