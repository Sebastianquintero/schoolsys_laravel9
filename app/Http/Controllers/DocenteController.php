<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Usuario;
use App\Exports\DocentesExport;
use App\Imports\DocentesImport;
use Maatwebsite\Excel\Facades\Excel;

class DocenteController extends Controller
{
    // Mostrar lista de docentes
    public function index()
    {
        $docentes = Docente::with('usuario')->paginate(10);
        $estudiantes = Estudiante::with('usuario')->paginate(10);
        return view('admin_crud.admin', compact('docentes', 'estudiantes'));
    }
    public function verCrudDocente()
    {
        $docentes = Docente::with('usuario')->paginate(10);
        return view('admin_crud.admin_crud_profesores.admin_crud_profesor', compact('docentes'));
    }
    public function create()
    {
        return view('admin_crud.admin_crud_profesores.admin_add_profesor');
    }

    public function edit($id)
    {
        $docente = Docente::with('usuario')->findOrFail($id);
        return view('admin_crud.admin_crud_profesores.admin_edit_profesor', compact('docente'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'tipo_documento' => 'required|string|max:50',
            'numero_documento' => 'required|string|max:50|unique:usuarios,numero_documento',
            'fecha_nacimiento' => 'required|date',
            'correo' => 'required|email|unique:usuarios,correo',
            'correo_personal' => 'required|email',
            'numero_telefono' => 'required|string|max:20',
            'cargo' => 'required|string|max:100',
            'tipo_contrato' => 'required|string',
            'duracion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'foto' => 'nullable|image|max:2048',

        ]);

        // Crear usuario
        $usuario = Usuario::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'correo' => $request->correo,
            'numero_telefono' => $request->numero_telefono,
            'fk_rol' => 2,
            'fk_colegio' => auth()->user()->fk_colegio,
            'contrasena' => bcrypt('12345678'), // Contraseña por defecto
        ]);

        // Guardar foto si existe
        $nombreFoto = null;
        if ($request->hasFile('foto')) {
            $nombreFoto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images/docentes'), $nombreFoto);
        }

        // Crear docente
        Docente::create([
            'fk_usuario' => $usuario->id_usuario,
            'foto' => $nombreFoto,
            'cargo' => $request->cargo,
            'tipo_contrato' => $request->tipo_contrato,
            'duracion' => $request->duracion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'correo_personal' => $request->correo_personal,
        ]);

        return redirect()->route('admin_crud_profesor')->with('success', 'Profesor creado correctamente');
    }
    public function update(Request $request, $id)
    {
        // Validar datos
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'tipo_contrato' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'duracion' => 'nullable|string|max:255',
            'numero_telefono' => 'required|string|max:20',
            'correo' => 'required|email',
            'correo_personal' => 'nullable|email',
            // otros campos si es necesario
        ]);

        // Buscar docente
        $docente = Docente::findOrFail($id);

        // Actualizar datos relacionados con el usuario
        $usuario = $docente->usuario;
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->numero_telefono = $request->numero_telefono;
        $usuario->correo = $request->correo;
        $usuario->save();

        // Actualizar datos del docente
        $docente->cargo = $request->cargo;
        $docente->tipo_contrato = $request->tipo_contrato;
        $docente->fecha_inicio = $request->fecha_inicio;
        $docente->fecha_fin = $request->fecha_fin;
        $docente->duracion = $request->duracion;

        $docente->correo_personal = $request->correo_personal;
        $docente->save();

        return redirect()->back()->with('success', 'Profesor actualizado correctamente');
    }
    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);

        // Eliminar también al usuario relacionado si lo deseas
        $usuario = $docente->usuario;
        $docente->delete();
        if ($usuario) {
            $usuario->delete();
        }

        return redirect()->back()->with('success', 'Docente eliminado correctamente.');
    }
    public function destroyAll()
    {
        $docentes = Docente::all();

        foreach ($docentes as $docente) {
            $usuario = $docente->usuario;
            $docente->delete();
            if ($usuario) {
                $usuario->delete();
            }
        }

        return redirect()->back()->with('success', 'Todos los docentes han sido eliminados.');
    }

    

}
