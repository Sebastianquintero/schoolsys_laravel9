<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Matricula;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    // LISTADO ADMIN con filtros
    public function index(Request $r)
    {
        $colegioId = auth()->user()->fk_colegio;
        $anio = $r->get('anio', school_year());
        $cursoId = $r->get('curso');
        $estado = $r->get('estado');
        $resultado = $r->get('resultado');
        $q = trim($r->get('q', ''));

        $cursos = Curso::where('fk_colegio', $colegioId)
            ->orderBy('numero_curso')
            ->get(['id_curso', 'numero_curso', 'nombre_curso']);

        $items = Matricula::with([
            'estudiante.usuario:id_usuario,nombres,apellidos',
            'curso:id_curso,numero_curso,nombre_curso',
        ])
            ->whereHas('estudiante', function ($qq) use ($colegioId, $q) {
                $qq->where('fk_colegio', $colegioId)
                    ->when($q, function ($w) use ($q) {
                        $w->whereHas('usuario', function ($u) use ($q) {
                            $u->where('nombres', 'like', "%$q%")
                                ->orWhere('apellidos', 'like', "%$q%");
                        });
                    });
            })
            ->anio($anio)
            ->curso($cursoId)
            ->estado($estado)
            ->resultado($resultado)
            ->orderByDesc('id_matricula')
            ->paginate(20)
            ->appends($r->query());

        return view('admin_crud.matriculas.index', compact('items', 'cursos', 'anio', 'cursoId', 'estado', 'resultado', 'q'));
    }

    // ACTUALIZAR una matrícula (estado/resultado/curso)
    public function update(Request $r, $id)
    {
        $r->validate([
            'estado' => 'required|in:regular,retirado,graduado',
            'resultado' => 'required|in:pendiente,aprobado,reprobado',
            'fk_curso' => 'required|integer|exists:cursos,id_curso',
        ]);

        $mat = Matricula::findOrFail($id);
        $mat->estado = $r->estado;
        $mat->resultado = $r->resultado;
        $mat->fk_curso = $r->fk_curso;
        $mat->save();

        return back()->with('ok', 'Matrícula actualizada.');
    }

    // RECONSTRUIR/CREAR matrículas faltantes para un año
    public function rebuild(Request $r)
    {
        $r->validate(['anio' => 'required|string']);
        $colegioId = auth()->user()->fk_colegio;
        $anio = $r->anio;

        DB::transaction(function () use ($colegioId, $anio) {
            $estudiantes = Estudiante::where('fk_colegio', $colegioId)->get(['id_estudiante', 'fk_curso']);
            foreach ($estudiantes as $e) {
                // si el estudiante no tiene curso activo y no está retirado, igual crea “pendiente”
                $cursoActual = $e->fk_curso ?? 0;

                Matricula::firstOrCreate(
                    ['fk_estudiante' => $e->id_estudiante, 'anio_escolar' => $anio],
                    [
                        'fk_curso' => $cursoActual ?: (Curso::where('fk_colegio', $colegioId)->min('id_curso') ?? 1),
                        'estado' => 'regular',
                        'resultado' => 'pendiente'
                    ]
                );
            }
        });

        return back()->with('ok', 'Matrículas reconstruidas/creadas para el año ' . $anio);
    }

    // ESTUDIANTE: ver su historial
    public function misMatriculas()
    {
        $user = auth()->user();
        $items = Matricula::with('curso:id_curso,numero_curso,nombre_curso')
            ->whereHas('estudiante', fn($q) => $q->where('fk_usuario', $user->id_usuario))
            ->orderByDesc('anio_escolar')
            ->get();

        return view('estudiante.matriculas.index', compact('items'));
    }
}
