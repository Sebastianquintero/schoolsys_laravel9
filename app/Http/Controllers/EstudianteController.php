<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Estudiante;

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
}
