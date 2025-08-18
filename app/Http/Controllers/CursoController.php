<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Materia;


class CursoController extends Controller
{
    // Método para mostrar todos los cursos
    public function index()
    {
        $cursos = Curso::all(); // O puedes usar paginate(10) para paginación
        return view('admin_crud.admin_crud_cursos.crud_ver_curso', compact('cursos'));
    }

    // Método para mostrar el formulario de creación

    public function create()
    {
        // Obtener todas las materias para mostrarlas en el select
        $materias = Materia::all();
        return view('admin_crud.admin_crud_cursos.admin_add_curso', compact('materias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_curso' => 'required|string|max:255',
            'numero_curso' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:Activo,Desactivado',
            'materias' => 'required|array'
        ]);

        // Crear curso
        $curso = Curso::create([
            'nombre_curso' => $request->nombre_curso,
            'numero_curso' => $request->numero_curso,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado
        ]);

        // Relacionar materias seleccionadas
        $curso->materias()->sync($request->materias);

        return redirect()->route('crud_ver_curso')->with('success', 'Curso creado correctamente con sus materias.');
    }


    public function verMaterias($id)
    {
        $curso = Curso::with('materiass')->findOrFail($id);
        return view('admin_crud.admin_crud_cursos.materias', compact('curso'));
    }

    /* ------ Actulizar Curso con los check-box ------- */

    public function edit($id)
    {
        $curso = Curso::with('materias')->findOrFail($id);
        $materias = Materia::all(); // todas las materias disponibles
        return view('admin_crud.admin_crud_cursos.admin_edit_curso', compact('curso', 'materias'));
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);

        // sincroniza las materias seleccionadas
        $curso->materias()->sync($request->materias ?? []);

        return redirect()->route('crud_ver_curso')->with('success', 'Curso actualizado correctamente');
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return redirect()->route('crud_ver_curso')->with('success', 'Curso eliminado correctamente');
    }

}