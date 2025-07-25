<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Usuario;

class EstudianteController extends Controller
{
    public function dashboard()
    {
        $usuario = Auth::user();

        // Verificamos si tiene relación con estudiante
        if (!$usuario->estudiante) {
            abort(403, 'No autorizado');
        }

        $estudiante = $usuario->estudiante;
        $colegio_id = Auth::user()->fk_colegio;

        $estudiantes = Estudiante::where('fk_colegio', $colegio_id)
            ->with('usuario')
            ->paginate(10);
        return view('estudiante.dashboard', compact('usuario', 'estudiante'));
    }


        public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'tipo_documento' => 'required|string|max:20',
            'numero_documento' => 'required|string|max:20|unique:usuarios,numero_documento',
            'fecha_nacimiento' => 'required|date',
            'numero_telefono' => 'required|string|max:20',
            'correo' => 'required|email|unique:usuarios,correo',
            'correo_personal' => 'required|email',
            'tipo_via' => 'required|string|max:20',
            'direccion' => 'required|string|max:150',
            'edad' => 'required|integer',
            'grado' => 'required|string|max:50',
            'curso' => 'required|string|max:50',
            'nivel_educativo' => 'required|string|max:30',
            'nacionalidad' => 'required|string|max:50',
            'acudiente' => 'required|string|max:100',
            'eps' => 'required|string|max:100',
            'sisben' => 'required|string|max:50',
        ]);

        // Crear usuario
        $usuario = Usuario::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'numero_telefono' => $request->numero_telefono,
            'correo' => $request->correo,
            'fk_rol' => 3, // Rol estudiante
            'fk_colegio' => auth()->user()->fk_colegio,
            'contrasena' => bcrypt('12345678'),
        ]);

        // Crear estudiante
        Estudiante::create([
            'fk_usuario' => $usuario->id_usuario,
            'tipo_via' => $request->tipo_via,
            'direccion' => $request->direccion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'edad' => $request->edad,
            'grado' => $request->grado,
            'curso' => $request->curso,
            'nivel_educativo' => $request->nivel_educativo,
            'nacionalidad' => $request->nacionalidad,
            'telefono' => $request->numero_telefono,
            'correo_personal' => $request->correo_personal,
            'acudiente' => $request->acudiente,
            'eps' => $request->eps,
            'sisben' => $request->sisben,
            'fk_colegio' => auth()->user()->fk_colegio,
        ]);

        return redirect()->back()->with('success', 'Estudiante registrado correctamente.');
    }

    public function index()
{
    $estudiantes = Estudiante::with('usuario')->paginate(10);
    return view('admin_crud.admin_crud_estudiantes.admin_user_all', compact('estudiantes'));
}

    public function verCrudEstudiante()
{
    $estudiantes = Estudiante::with('usuario')->paginate(10);
    return view('admin_crud.admin_crud_estudiantes.admin_user_all', compact('estudiantes'));
}

//Editar estudiante

public function edit($id)
{
    $estudiante = Estudiante::with('usuario')->findOrFail($id);
    return view('admin_crud.admin_crud_estudiantes.admin_edit_estudiante', compact('estudiante'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nombres' => 'required|string|max:100',
        'apellidos' => 'required|string|max:100',
        'numero_telefono' => 'required|string|max:20',
        'correo' => 'required|email',
        'correo_personal' => 'required|email',
        'direccion' => 'required|string|max:150',
        'edad' => 'required|integer',
        'grado' => 'required|string|max:50',
        'curso' => 'required|string|max:50',
        'nivel_educativo' => 'required|string|max:30',
        'nacionalidad' => 'required|string|max:50',
        'acudiente' => 'required|string|max:100',
        'eps' => 'required|string|max:100',
        'sisben' => 'required|string|max:50',
    ]);

    $estudiante = Estudiante::findOrFail($id);
    $usuario = $estudiante->usuario;

    // Actualizar usuario
    $usuario->nombres = $request->nombres;
    $usuario->apellidos = $request->apellidos;
    $usuario->numero_telefono = $request->numero_telefono;
    $usuario->correo = $request->correo;
    $usuario->save();

    // Actualizar estudiante
    $estudiante->correo_personal = $request->correo_personal;
    $estudiante->direccion = $request->direccion;
    $estudiante->edad = $request->edad;
    $estudiante->grado = $request->grado;
    $estudiante->curso = $request->curso;
    $estudiante->nivel_educativo = $request->nivel_educativo;
    $estudiante->nacionalidad = $request->nacionalidad;
    $estudiante->acudiente = $request->acudiente;
    $estudiante->eps = $request->eps;
    $estudiante->sisben = $request->sisben;
    $estudiante->save();

    return redirect()->route('lista_estudiantes_admin')->with('success', 'Estudiante actualizado correctamente.');
}

public function destroy($id)
{
    $estudiante = Estudiante::findOrFail($id);

    $usuario = $estudiante->usuario;

    $estudiante->delete();
    if ($usuario) {
        $usuario->delete();
    }

    return redirect()->back()->with('success', 'Estudiante eliminado correctamente.');
}

public function destroyAll()
{
    $estudiantes = Estudiante::all();

    foreach ($estudiantes as $estudiante) {
        $usuario = $estudiante->usuario;
        $estudiante->delete();
        if ($usuario) {
            $usuario->delete();
        }
    }

    return redirect()->back()->with('success', 'Todos los estudiantes han sido eliminados correctamente.');



}
}
