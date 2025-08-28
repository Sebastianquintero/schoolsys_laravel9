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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all();
        $docentes = Usuario::where('fk_rol', '2')->get();
        $materias = Materia::all();

        $docentes = Docente::with('usuario')
    ->whereHas('usuario') // solo los que tienen usuario asociado
    ->get();
        return view('admin_crud.admin_calificaciones.asignar_curso_materia', compact('cursos', 'docentes', 'materias'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fk_curso' => 'required|exists:cursos,id_curso',
            'fk_docente' => 'required|exists:usuarios,id_usuario',
            'fk_materia' => 'required|exists:materias,id_materia',
        ]);

        DB::table('curso_docente_materia')->insert([
            'fk_curso' => $request->fk_curso,
            'fk_docente' => $request->fk_docente,
            'fk_materia' => $request->fk_materia,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('lista_cursos')->with('success', 'Asignación realizada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CursoDocenteMateria  $cursoDocenteMateria
     * @return \Illuminate\Http\Response
     */
    public function show(CursoDocenteMateria $cursoDocenteMateria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CursoDocenteMateria  $cursoDocenteMateria
     * @return \Illuminate\Http\Response
     */
    public function edit(CursoDocenteMateria $cursoDocenteMateria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CursoDocenteMateria  $cursoDocenteMateria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CursoDocenteMateria $cursoDocenteMateria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CursoDocenteMateria  $cursoDocenteMateria
     * @return \Illuminate\Http\Response
     */
    public function destroy(CursoDocenteMateria $cursoDocenteMateria)
    {
        //
    }
}
