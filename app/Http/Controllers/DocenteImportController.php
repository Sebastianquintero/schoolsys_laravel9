<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DocentesImport;
use Maatwebsite\Excel\Facades\Excel;

class DocenteImportController extends Controller
{
    public function show()
    {
        return view('admin_crud.import_export.importar_docentes');
    }

    public function import(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        $import = new DocentesImport();
        Excel::import($import, $request->file('archivo'));

        return back()->with(
            'mensaje',
            "Importados: {$import->getImportados()}, Omitidos: {$import->getOmitidos()}"
        );
    }
}
