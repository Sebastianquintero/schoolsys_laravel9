<?php

namespace App\Exports;

use App\Models\Estudiante;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;

class EstudiantesExport implements FromView
{
    
    public function view(): View
    {
        $colegio = Auth::user()->fk_colegio;

        $estudiantes = Estudiante::where('fk_colegio', $colegio)
            ->with('usuario') // si tienes relación con Usuario
            ->get();

        return view('admin_crud.import_export.exportar_estudiantes', [
            'estudiantes' => $estudiantes
        ]);
    }
}
