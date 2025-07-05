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
        $request->validate([
            'archivo' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        $import = new EstudiantesImport();
        Excel::import($import, $request->file('archivo'));

        return back()->with(
            'mensaje',
            "Importados: {$import->getImportados()}, Omitidos (duplicados): {$import->getOmitidos()}"
        );
    }
}
