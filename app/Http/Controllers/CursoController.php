<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function create()
    {
        $estados = Curso::$estadosValidos;
        return view('cursos.create', compact('estados'));
    }

        public function store(Request $request)
    {
        $validated = $request->validate(Curso::rules());
        
        Curso::create($validated);
        
        return redirect()->route('cursos.index')
                         ->with('success', 'Curso creado exitosamente');
    }
}

