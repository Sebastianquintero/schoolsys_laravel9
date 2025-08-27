<?php

namespace App\Http\Controllers;

use App\Models\Observador;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObservadorController extends Controller
{
    public function index(Request $r)
    {
        $colegioId = Auth::user()->fk_colegio;
    $q = trim((string) $r->input('q'));

    $items = Observador::with([
            'estudiante.usuario:id_usuario,nombres,apellidos',
            'curso:id_curso,numero_curso',
            'docente:id_docente,fk_usuario',
            'docente.usuario:id_usuario,nombres,apellidos',
        ])
        ->where('fk_colegio', $colegioId)
        ->when($q, function ($query) use ($q) {
            $query->whereHas('estudiante.usuario', function ($u) use ($q) {
                $u->whereRaw("CONCAT(nombres,' ',apellidos) LIKE ?", ["%{$q}%"]);
            });
        })
        ->orderByDesc('fecha')
        ->paginate(15)
        ->appends($r->only('q'));

    return view('admin_crud.observador.index', compact('items', 'q'));
    }

    public function create()
    {
        $colegioId = Auth::user()->fk_colegio;

        // Traer cursos del colegio con sus estudiantes y el usuario de cada estudiante
        $cursos = Curso::where('fk_colegio', $colegioId)
            ->orderBy('numero_curso')
            ->with([
                'estudiantes' => function ($q) {
                    $q->whereHas('usuario')
                        ->join('usuarios', 'usuarios.id_usuario', '=', 'estudiantes.fk_usuario')
                        ->orderBy('usuarios.nombres')
                        ->select('estudiantes.*'); // ¡importante!
                },
                'estudiantes.usuario:id_usuario,nombres,apellidos'
            ])
            ->get(['id_curso', 'nombre_curso', 'numero_curso']);

        
        // Docentes del colegio (para el select docente)
        $docentes = Docente::query()
            ->whereHas('usuario', fn($u) => $u->where('fk_colegio', $colegioId))
            ->join('usuarios', 'usuarios.id_usuario', '=', 'docentes.fk_usuario')
            ->select('docentes.*') // evita choques de nombres de columnas
            ->orderByRaw("CONCAT(usuarios.nombres, ' ', usuarios.apellidos)")
            ->with('usuario:id_usuario,nombres,apellidos') // para usar en la vista
            ->get();

        // Si el usuario es docente, usar su id_docente como valor por defecto
        $docentePorDefectoId = optional(auth()->user()->docente)->id_docente;
        return view('admin_crud.observador.create', compact('cursos','docentes','docentePorDefectoId'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'fk_estudiante' => 'required|integer|exists:estudiantes,id_estudiante',
            'fecha' => 'required|date',
            'observaciones' => 'required|string|min:5',
            'nombre_padre' => 'nullable|string|max:120',
            'nombre_madre' => 'nullable|string|max:120',
            'nombre_acudiente' => 'nullable|string|max:120',
            'fk_docente' => 'nullable|integer|exists:docentes,id_docente',
            'firma_nombre' => 'nullable|string|max:120',
            'firma' => 'nullable|image|max:2048', // si subes firma
        ]);
        // Si el que registra es docente y no seleccionó, usar su propio id_docente
        $fkDocente = $r->fk_docente;
        if (!$fkDocente && auth()->user()->fk_rol == 2 /* rol docente */) {
            $fkDocente = optional(auth()->user()->docente)->id_docente;
        }
        // Resolver curso del estudiante
        $est = Estudiante::with(['usuario', 'curso'])->findOrFail($r->fk_estudiante);

        $data = [
            'fk_estudiante' => $est->id_estudiante,
            'fk_docente' => $fkDocente, // usuario que registra
            'fk_curso' => $est->fk_curso ?? ($est->curso->id_curso ?? null),
            'fk_colegio' => Auth::user()->fk_colegio,
            'anio_escolar' => now()->month >= 1 ? now()->format('Y') . '-' . (now()->year + 1) : (now()->year - 1) . '-' . now()->year, // ajusta si usas helper
            'fecha' => $r->fecha,
            'nombre_padre' => $r->nombre_padre,
            'nombre_madre' => $r->nombre_madre,
            'nombre_acudiente' => $r->nombre_acudiente,
            'observaciones' => $r->observaciones,
            'firma_nombre' => $r->firma_nombre,
        ];

        if ($r->hasFile('firma')) {
            $data['firma_path'] = $r->file('firma')->store('observador/firmas', 'public');
        }

        $obs = Observador::create($data);

        return redirect()->route('admin.observador.show', $obs->id_observador)
            ->with('ok', 'Observación registrada');
    }

    public function show($id)
    {
        $obs = Observador::with(['estudiante.usuario', 'docente.usuario', 'curso', 'colegio'])->findOrFail($id);
        return view('admin_crud.observador.show', compact('obs'));
    }

    public function destroy($id)
    {
        $obs = Observador::findOrFail($id);
        $obs->delete();

        return redirect()->route('admin.observador.index')
            ->with('success', 'Observación eliminada correctamente.');
    }

    // estudiante ve sus registros
    public function misRegistros()
    {
        $user = Auth::user();
        $est = $user->estudiante;

        $items = Observador::with(['docente', 'curso'])
            ->where('fk_estudiante', $est->id_estudiante)
            ->orderByDesc('fecha')
            ->paginate(15);

        return view('estudiante.observador.index', compact('items'));
    }

    // PDF
    public function pdf($id)
    {
        $obs = Observador::with([
            // estudiante -> usuario
            'estudiante.usuario:id_usuario,nombres,apellidos,correo,numero_telefono',
            // curso
            'curso:id_curso,nombre_curso,numero_curso',
            // docente -> usuario
            'docente.usuario:id_usuario,nombres,apellidos',
            // colegio
            'colegio:id_colegio,nombre',
        ])->findOrFail($id);


        // Habilitar recursos remotos si tu vista usa asset() con http(s)
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin_crud.observador.pdf', compact('obs'));
        $pdf->setOptions(['isRemoteEnabled' => true]);

        $file = 'observador_' . $obs->id_observador . '.pdf';
        return $pdf->download($file);
    }
}
