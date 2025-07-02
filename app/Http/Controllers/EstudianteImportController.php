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

    try {
        $archivo = $request->file('archivo');

        // Verifica si el archivo fue recibido
        if (!$archivo || !$archivo->isValid()) {
            return back()->with('error', 'Archivo no válido.');
        }


        // Importar datos
        Excel::import(new EstudiantesImport, $archivo);

        return back()->with('success', 'Estudiantes importados correctamente.');
    } catch (\Exception $e) {
        // Log para ayudarte a detectar errores
        logger()->error('Error al importar estudiantes: ' . $e->getMessage());

        return back()->with('error', 'Ocurrió un error durante la importación.');
    }
}
}
