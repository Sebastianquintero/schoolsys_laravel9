<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

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
        $estados = Curso::$estadosValidos;
        return view('admin_crud.admin_crud_cursos.admin_add_cursos', compact('estados'));
    }

    // Método para guardar un nuevo curso
    public function store(Request $request)
    {
        $validated = $request->validate(Curso::rules());
        
        Curso::create($validated);
        
        return redirect()->route('crud_ver_curso')
                         ->with('success', 'Curso creado exitosamente');
    }

    public function show(Curso $curso)
    {
        return "Mostrar detalles del curso".$curso->id_curso;
    }


public function edit($id_curso)
{
    //return $id_curso;
    $curso = Curso::findOrFail($id_curso);
    return view('admin_crud.admin_crud_cursos.admin_edit_curso', compact('curso'));


}




       public function update(Request $request, $id_curso)
{
    // Validar datos
    $validated = $request->validate([
        'nombre_curso' => 'required|string|max:255',
        'numero_curso' => 'required|string|max:20',
        'descripcion' => 'required|string|max:255',
        'estado' => 'required|in:Activo,Inactivo',
    ]);

    // Buscar y actualizar curso
    $curso = Curso::findOrFail($id_curso);
    $curso->update([
        'nombre_curso' => $validated['nombre_curso'],
        'numero_curso' => $validated['numero_curso'],
        'descripcion' => $validated['descripcion'],
        'estado' => $validated['estado']
    ]);

    return redirect()->route('crud_ver_curso')
                    ->with('success', 'Curso actualizado correctamente');
}


    public function destroy($id_curso)
    {
        $curso = Curso::findOrFail($id_curso);
        $curso->delete();

        return redirect()->back()->with('success', 'Curso eliminado correctamente.');
    }

}