<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Usuario;
use App\Exports\DocentesExport;
use App\Imports\DocentesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Carbon\Carbon;

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

            // enums controlados
            'tipo_documento' => 'required|string|in:CC,Pasaporte,PPT,PEP',
            'numero_documento' => 'required|string|max:50|unique:usuarios,numero_documento',

            'fecha_nacimiento' => 'required|date',

            // correo institucional lo podemos autogenerar, pero si llega lo validamos
            'correo' => 'nullable|email|unique:usuarios,correo',
            'correo_personal' => 'required|email',

            'numero_telefono' => 'required|string|max:20',
            'cargo' => 'required|string|max:100',

            'tipo_contrato' => 'required|string|in:Contrato indefinido,Contrato definido,Contrato prestación de servicios,Contrato obra y labor,Contrato por horas',

            // fechas y duración: la duración se calculará, no se pide al usuario
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',

            'foto' => 'nullable|image|max:2048',
        ]);

        // 1) Calcular duración (años/meses/días) y validar que no sea 0 negativo
        $inicio = Carbon::parse($request->fecha_inicio)->startOfDay();
        $fin = Carbon::parse($request->fecha_fin)->startOfDay();

        // diferencia total en días
        $dias = $inicio->diffInDays($fin);
        if ($dias <= 0) {
            return back()->withErrors(['duracion' => 'La duración del contrato debe ser mayor a 0 días.'])->withInput();
        }

        // Formato humano años/meses/días
        $interval = $inicio->diff($fin);
        $duracionHumana = sprintf('%d años, %d meses, %d días', $interval->y, $interval->m, $interval->d);

        // 2) Generar correo institucional si no viene
        $correoInst = $request->correo;
        if (empty($correoInst)) {
            $correoInst = $this->generarCorreoInstitucional(
                $request->nombres,
                $request->apellidos,
                config('app.domain_mail', 'school.edu.co') // edita si tienes un dominio real
            );
        }

        // 3) Crear usuario (rol docente = 2)
        $usuario = Usuario::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'correo' => $correoInst,
            'numero_telefono' => $request->numero_telefono,
            'fk_rol' => 2,
            'fk_colegio' => auth()->user()->fk_colegio,
            'contrasena' => bcrypt('12345678'),
        ]);

        // 4) Foto
        $nombreFoto = null;
        if ($request->hasFile('foto')) {
            $nombreFoto = time() . '.' . $request->file('foto')->extension();
            $request->file('foto')->move(public_path('images/docentes'), $nombreFoto);

            // Guardar la ruta en usuarios.foto_path
            $usuario->foto_path = 'images/docentes/' . $nombreFoto;
            $usuario->save();
        }

        // 5) Docente (sin 'foto')
        Docente::create([
            'fk_usuario' => $usuario->id_usuario,
            'cargo' => $request->cargo,
            'tipo_contrato' => $request->tipo_contrato,
            'duracion' => $duracionHumana,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'correo_personal' => $request->correo_personal,
        ]);

        return redirect()->route('admin_crud_profesor')->with('success', 'Profesor creado correctamente');
    }

    /**
     * Genera email institucional con 2 letras del nombre + 2 del apellido + dominio.
     * Si existe, agrega sufijo incremental -1, -2, ...
     */
    protected function generarCorreoInstitucional(string $nombres, string $apellidos, string $dominio): string
    {
        // primer nombre / primer apellido
        $nom = Str::of($nombres)->trim()->lower()->explode(' ')->first();
        $ape = Str::of($apellidos)->trim()->lower()->explode(' ')->first();

        // limpiar acentos y no-alfanum
        $nom = Str::ascii($nom);
        $ape = Str::ascii($ape);

        $pref = substr($nom, 0, 2) . substr($ape, 0, 2); // dos y dos
        $pref = preg_replace('/[^a-z0-9]/', '', $pref);  // seguridad

        if ($pref === '') {
            $pref = 'us'; // fallback
        }

        $base = $pref . '@' . $dominio;
        $correo = $base;

        // resolver colisiones
        $i = 1;
        while (Usuario::where('correo', $correo)->exists()) {
            $correo = $pref . '-' . $i . '@' . $dominio;
            $i++;
        }

        return $correo;
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
