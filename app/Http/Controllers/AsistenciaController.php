<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Curso;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AsistenciaController extends Controller
{
    // Vista con select de curso y fecha
    public function tomar(Request $r)
    {
        $colegioId = auth()->user()->fk_colegio;

        $cursos = Curso::where('fk_colegio',$colegioId)
            ->orderBy('numero_curso')
            ->get(['id_curso','nombre_curso','numero_curso']);

        // parámetros por defecto
        $cursoId = $r->curso ?? ($cursos->first()->id_curso ?? null);
        $fecha   = $r->fecha ?? now()->toDateString();

        return view('admin_crud.asistencias.tomar', compact('cursos','cursoId','fecha'));
    }

    // Carga alumnos + asistencias del día
    public function cargar(Request $r)
    {
        $r->validate([
            'curso' => 'required|integer|exists:cursos,id_curso',
            'fecha' => 'required|date',
        ]);

        $cursoId = (int) $r->curso;
        $fecha   = $r->fecha;

        $alumnos = Estudiante::with('usuario:id_usuario,nombres,apellidos')
            ->where('fk_curso',$cursoId)
            ->orderByRaw("CONCAT_WS(' ', grado, id_estudiante)")
            ->get();

        // Trae asistencias existentes de ese día
        $asistencias = Asistencia::where('fk_curso',$cursoId)
            ->where('fecha_asistencia',$fecha)
            ->get()
            ->keyBy('fk_usuario')      // [fk_usuario => Asistencia]
            ->map(fn($a) => $a->estado) // [fk_usuario => 'asistio'|'falto'|...]
            ->toArray();

        return view('admin_crud.asistencias.cargar', compact('alumnos','asistencias','cursoId','fecha'));
    }

    // Guarda (upsert) estados
    public function guardar(Request $r)
    {
        $r->validate([
            'curso_id' => 'required|integer|exists:cursos,id_curso',
            'fecha'    => 'required|date',
            'estado'   => 'nullable|array', // estado[uid] = enum
        ]);

        $cursoId = (int) $r->curso_id;
        $fecha   = $r->fecha;
        $estados = $r->input('estado', []); // [uid => 'asistio|falto|tarde|justificado']

        $validos = ['asistio','falto','tarde','justificado'];

        foreach ($estados as $uid => $estado) {
            if (!in_array($estado, $validos, true)) {
                continue; // ignora valores inválidos
            }

        Asistencia::updateOrCreate(
            [
                'fk_curso'         => $cursoId,
                'fk_usuario'       => (int) $uid,
                'fecha_asistencia' => $fecha,
            ],
            [
                'estado' => $estado,
            ]
        );
    }

    return back()->with('ok', 'Asistencias guardadas');
    }

    /**
     * ESTUDIANTE: ver su propio historial
     */
    public function misAsistencias()
    {
        $user = auth()->user();

        // listado paginado
        $asistencias = Asistencia::where('fk_usuario', $user->id_usuario)
            ->orderByDesc('fecha_asistencia')
            ->paginate(15);

        // estadísticas simples
        $stats = [
            'presentes' => Asistencia::where('fk_usuario', $user->id_usuario)
                ->where('estado', 'asistio')
                ->count(),
            'faltas'    => Asistencia::where('fk_usuario', $user->id_usuario)
                ->whereIn('estado', ['falto', 'tarde', 'justificado'])
                ->count(),
        ];

        return view('estudiante.asistencias.index', compact('asistencias', 'stats'));
    }
}
