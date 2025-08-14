<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class MateriaController extends Controller
{
    // Método para mostrar todas las Materias
    public function index()
    {
        $materias = Materia::all(); // O puedes usar paginate(10) para paginación
        return view('admin_crud.admin_crud_materias.admin_ver_materia', compact('materias'));
    }

    // Método para mostrar el formulario de creación
    public function create()
    {
        $estados = Materia::$estadosValidos;
        return view('admin_crud.admin_crud_materias.admin_add_materia', compact('estados'));
    }

    // Método para guardar una nueva materia
    public function store(Request $request)
    {
        $validated = $request->validate(Materia::rules());

        Materia::create($validated);

        return redirect()->route('admin_ver_materia')
            ->with('success', 'Materia creada exitosamente');
    }

    public function show(Materia $Materia)
    {
        return "Mostrar detalles de la Materia" . $Materia->id_materia;
    }


    public function edit($id_materia)
    {
        //return $id_curso;
        $materia = Materia::findOrFail($id_materia);
        return view('admin_crud.admin_crud_materias.admin_edit_materia', compact('materia'));


    }




    public function update(Request $request, $id_materia)
    {
        // Validar datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|in:Activo,Inactivo',
        ]);

        // Buscar y actualizar curso
        $materia = Materia::findOrFail($id_materia);
        $materia->update([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'estado' => $validated['estado']
        ]);

        return redirect()->route('admin_ver_materia')
            ->with('success', 'Materia actualizada correctamente');
    }


    public function destroy($id_materia)
    {
        $materia = Materia::findOrFail($id_materia);
        $materia->delete();

        return redirect()->back()->with('success', 'Materia eliminada correctamente.');
    }
}
