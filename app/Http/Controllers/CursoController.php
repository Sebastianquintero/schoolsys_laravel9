<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::where('fk_colegio', auth()->user()->fk_colegio)->get();
        return view('admin_crud.admin_crud_cursos.crud_ver_curso', compact('cursos'));
    }

    public function create()
    {
        return view('admin_crud.admin_crud_cursos.admin_add_curso');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'nullable|string',
        ]);

        Curso::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fk_colegio' => auth()->user()->fk_colegio,
            'nivel' => $request->nivel,
        ]);

        return redirect()->route('crud_ver_curso')->with('success', 'Curso creado');
    }
}
