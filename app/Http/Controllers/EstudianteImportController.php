<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\EstudiantesImport;
use Maatwebsite\Excel\Facades\Excel;

class EstudianteImportController extends Controller
{
    public function show()
    {
        return view('admin_crud.import_export.importar_estudiantes');
    }

    public function import(Request $request)
    {
        

        $request->validate(['archivo' => 'required|mimes:csv,xlsx']);

        Excel::import(new EstudiantesImport, $request->file('archivo'));

        return redirect()->back()->with('success', 'Estudiantes importados correctamente.');
    }
}
