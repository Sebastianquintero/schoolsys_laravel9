<?php

namespace App\Http\Controllers;

use App\Models\CursoDocenteMateria;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Usuario;
use App\Models\Docente;
use App\Models\Materia;
use Illuminate\Support\Facades\DB;


class CursoDocenteMateriaController extends Controller
{

    public function create(Request $request)
    {
        $cursos = Curso::orderBy('numero_curso', 'asc')->get();
        $materias = Materia::all();
        $docentes = Usuario::where('fk_rol', 2)->get(); // rol 2 = docentes

        $asignaciones = [];

        if ($request->has('fk_docente') && $request->fk_docente) {
            $docenteId = $request->fk_docente;

            $asignaciones = DB::table('curso_docente_materia')
                ->join('usuarios', 'usuarios.id_usuario', '=', 'curso_docente_materia.fk_docente')
                ->join('cursos', 'cursos.id_curso', '=', 'curso_docente_materia.fk_curso')
                ->join('materias', 'materias.id_materia', '=', 'curso_docente_materia.fk_materia')
                ->where('curso_docente_materia.fk_docente', $docenteId)
                ->select(
                    'curso_docente_materia.id_asignacion',
                    'cursos.nombre_curso',
                    'cursos.numero_curso',
                    'materias.nombre as nombre_materia'
                )
                ->get();
        }

        return view('admin_crud.admin_calificaciones.asignar_curso_materia', compact(
            'cursos',
            'docentes',
            'materias',
            'asignaciones'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fk_docente' => 'required|exists:usuarios,id_usuario',
            'fk_curso' => 'required|exists:cursos,id_curso',
            'fk_materia' => 'required|exists:materias,id_materia',
        ]);

        // Validar duplicados
        $existe = DB::table('curso_docente_materia')
            ->where('fk_docente', $request->fk_docente)
            ->where('fk_curso', $request->fk_curso)
            ->where('fk_materia', $request->fk_materia)
            ->exists();

        if ($existe) {
            return back()->with('error', 'Esta asignación ya existe para este docente.');
        }

        DB::table('curso_docente_materia')->insert([
            'fk_docente' => $request->fk_docente,
            'fk_curso' => $request->fk_curso,
            'fk_materia' => $request->fk_materia,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('curso_docente_materia.create', ['fk_docente' => $request->fk_docente])
            ->with('success', 'Asignación realizada correctamente.');

    }

    public function destroy($id_asignacion)
    {
        $asignacion = DB::table('curso_docente_materia')->where('id_asignacion', $id_asignacion)->first();

        if (!$asignacion) {
            return back()->with('error', 'Asignación no encontrada');
        }

        DB::table('curso_docente_materia')->where('id_asignacion', $id_asignacion)->delete();

        return back()->with('success', 'Asignación eliminada correctamente');
    }


}
