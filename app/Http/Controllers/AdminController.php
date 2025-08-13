<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Models\Curso;
use App\Models\Anuncio;

class AdminController extends Controller
{
    public function verEstudiantes()
    {
        $colegioId = auth()->user()->fk_colegio;

        $estudiantes = Usuario::where('fk_rol', 3)->with('estudiante')->paginate(10);
        $docentes = Docente::with('usuario')->paginate(10);
        $cursos = Curso::select('id_curso', 'nombre_curso', 'numero_curso', 'estado')
            ->orderByDesc('id_curso')->take(10)->get();

        // Paginado de anuncios para el panel admin
        $anuncios = Anuncio::where('fk_colegio', $colegioId)
            ->orderByDesc('fecha')
            ->paginate(10)
            ->withQueryString();

        return view('admin_crud.admin', compact('estudiantes', 'docentes', 'cursos', 'anuncios'));
    }

    // Vista separada: admin_user_all.blade.php
    public function verTodosLosEstudiantes()
    {
        $estudiantes = Usuario::where('fk_rol', 3)
            ->with('estudiante')
            ->paginate(10);

        return view('admin_crud.admin_crud_estudiantes.admin_user_all', compact('estudiantes'));
    }

    // Actualizar estudiante
    // Esta función maneja la actualización de los datos del estudiante y su usuario asociado.
    // Se espera que el formulario envíe los datos necesarios para actualizar tanto el usuario como
    // el estudiante, incluyendo la foto del estudiante si se proporciona.
    public function actualizarEstudiante(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $usuario = $estudiante->usuario;

        $usuario->update([
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'correo' => $request->input('correo'),
        ]);

        $estudiante->update([
            'telefono' => $request->telefono,
            'acudiente' => $request->acudiente,
            'correo_personal' => $request->correo_personal,
            'direccion' => $request->direccion,
        ]);

        // Guardar imagen si se subió
        if ($request->hasFile('foto')) {
            $filename = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images/estudiantes'), $filename);
            $estudiante->foto = 'images/estudiantes/' . $filename;
            $estudiante->save();
        }

        return redirect()->route('admin.usuarios')->with('success', 'Estudiante actualizado correctamente.');
    }

    // Eliminar estudiante
    public function eliminarEstudiante($id)
    {
        $estudiante = Estudiante::findOrFail($id);

        // Eliminar imagen si existe
        if ($estudiante->foto && file_exists(public_path($estudiante->foto))) {
            unlink(public_path($estudiante->foto));
        }

        // Eliminar el usuario relacionado
        $estudiante->usuario()->delete();

        // Eliminar al estudiante
        $estudiante->delete();

        return redirect()->route('admin.usuarios')->with('success', 'Estudiante eliminado correctamente.');
    }

    // Método para mostrar la lista de cursos
    public function verTodosLosCursos()
    {
        $cursos = Curso::withCount('cursos') // Opcional: contar estudiantes inscritos
            ->orderBy('numero_curso')
            ->paginate(10);

        return view('admin_crud.admin', compact('cursos'));
    }

}