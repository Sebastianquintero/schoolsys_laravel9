<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Matricula;
use Illuminate\Support\Facades\DB;

class PromocionController extends Controller
{
    public function index()
    {
        $colegioId = auth()->user()->fk_colegio;

        $cursos = Curso::where('fk_colegio', $colegioId)
            ->orderBy('numero_curso')
            ->get(['id_curso', 'nombre_curso', 'numero_curso']);

        $anio = \school_year(); // helper

        return view('admin_crud.promocion.index', compact('cursos', 'anio'));
    }

    public function cargar(Request $r)
    {
        $r->validate([
            'curso' => 'required|integer|exists:cursos,id_curso',
            'anio' => 'required|string',
        ]);

        $colegioId = auth()->user()->fk_colegio;
        $cursoId = (int) $r->curso;
        $anio = (string) $r->anio;   // <- usa el año que envía el usuario

        $curso = Curso::where('fk_colegio', $colegioId)->findOrFail($cursoId);

        // Trae TODOS los estudiantes del curso (evito ORDER por join;
        // ordeno en PHP para no afectar el resultado).
        $alumnos = Estudiante::query()
            ->where('fk_curso', $cursoId) // solo por curso
            ->whereHas('usuario', function ($q) use ($colegioId) {
                $q->where('fk_colegio', $colegioId);
            })
            ->leftJoin('usuarios', 'usuarios.id_usuario', '=', 'estudiantes.fk_usuario') // para ordenar
            ->select('estudiantes.*') // ¡importante!
            ->with('usuario:id_usuario,nombres,apellidos')
            ->orderByRaw("CONCAT(usuarios.apellidos,' ',usuarios.nombres)")
            ->get();

        // Matriculas del año actual (por si deseas mostrar algo existente)
        $matriculas = Matricula::where('anio_escolar', $anio)
            ->whereIn('fk_estudiante', $alumnos->pluck('id_estudiante'))
            ->get()
            ->keyBy('fk_estudiante');

        $cursoSiguiente = $this->cursoSiguiente($curso);

        $cursos = Curso::where('fk_colegio', $colegioId)
            ->orderBy('numero_curso')
            ->get(['id_curso', 'numero_curso', 'nombre_curso']);

        return view('admin_crud.promocion.cargar', compact(
            'curso',
            'alumnos',
            'matriculas',
            'cursoSiguiente',
            'cursos',
            'anio'
        ));
    }

    // Regla ejemplo para sugerir curso siguiente (ajústala a tu lógica)
    protected function cursoSiguiente(Curso $actual): ?Curso
    {
        $num = (int) $actual->numero_curso;
        $nivel = (int) floor($num / 100);   // ej: 302 -> 3
        $resto = $num % 100;                // ej: 302 -> 2
        $numSiguiente = ($nivel + 1) * 100 + $resto; // 402

        return Curso::where('fk_colegio', auth()->user()->fk_colegio)
            ->where('numero_curso', $numSiguiente)
            ->first();
    }

    public function guardar(Request $r)
    {
        $r->validate([
            'curso_id' => 'required|integer|exists:cursos,id_curso',
            'anio' => 'required|string',
            'decision' => 'required|array',  // decision[est_id]
            'destino' => 'nullable|array',  // destino[est_id]
        ]);

        DB::transaction(function () use ($r) {
            foreach ($r->decision as $estId => $decision) {
                $estId = (int) $estId;
                $decision = (string) $decision;

                // Matricula del año actual (crea si no existe)
                $mat = Matricula::firstOrCreate(
                    ['fk_estudiante' => $estId, 'anio_escolar' => $r->anio],
                    ['fk_curso' => $r->curso_id, 'estado' => 'regular', 'resultado' => 'pendiente']
                );

                if ($decision === 'aprobado') {
                    $mat->resultado = 'aprobado';

                    $dest = (int) ($r->destino[$estId] ?? 0);
                    if ($dest > 0) {
                        // mover estudiante a curso destino
                        Estudiante::where('id_estudiante', $estId)
                            ->update(['fk_curso' => $dest]);

                        // crear matrícula del siguiente año
                        $siguienteAnio = $this->siguienteAnio($r->anio);
                        Matricula::firstOrCreate(
                            ['fk_estudiante' => $estId, 'anio_escolar' => $siguienteAnio],
                            ['fk_curso' => $dest, 'estado' => 'regular', 'resultado' => 'pendiente']
                        );
                    }

                } elseif ($decision === 'reprobado') {
                    $mat->resultado = 'reprobado';

                    // matrícula siguiente año en el mismo curso
                    $siguienteAnio = $this->siguienteAnio($r->anio);
                    Matricula::firstOrCreate(
                        ['fk_estudiante' => $estId, 'anio_escolar' => $siguienteAnio],
                        ['fk_curso' => $r->curso_id, 'estado' => 'regular', 'resultado' => 'pendiente']
                    );

                } elseif ($decision === 'retirado') {
                    $mat->resultado = 'pendiente';
                    $mat->estado = 'retirado';

                    // opcional: dejar sin curso activo
                    Estudiante::where('id_estudiante', $estId)
                        ->update(['fk_curso' => null]);
                }

                $mat->save();
            }
        });

        return back()->with('ok', 'Promociones aplicadas correctamente.');
    }

    protected function siguienteAnio(string $anio): string
    {
        // "2025-2026" -> "2026-2027"
        [$a, $b] = explode('-', $anio);
        return (++$a) . '-' . (++$b);
    }
}
