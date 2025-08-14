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
            'descripcion'  => 'nullable|string',
            'estado'       => 'required|in:Activo,Desactivado',
            'materias'     => 'required|array'
        ]);

        // Crear curso
        $curso = Curso::create([
            'nombre_curso' => $request->nombre_curso,
            'numero_curso' => $request->numero_curso,
            'descripcion'  => $request->descripcion,
            'estado'       => $request->estado
        ]);

        // Relacionar materias seleccionadas
        $curso->materias()->sync($request->materias);

        return redirect()->route('cursos.index')->with('success', 'Curso creado correctamente con sus materias.');
    }
}