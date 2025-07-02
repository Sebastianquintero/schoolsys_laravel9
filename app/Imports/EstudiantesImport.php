<?php

namespace App\Imports;

use App\Models\Estudiante;
use App\Models\Usuario;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EstudiantesImport implements ToModel
{
public function model(array $row)
{
    if (Str::lower(trim($row[0])) === 'nombres') return null;

    $row = array_map(fn($val) => trim((string)$val), $row);

    // Validar la fecha
    $fecha = $this->transformarFecha($row[5]);
    if (!$fecha) return null; // Omite la fila si no se puede transformar

    $usuario = Usuario::create([
        'nombres'            => $row[0],
        'apellidos'          => $row[1],
        'tipo_documento'     => $row[2],
        'numero_documento'   => $row[3],
        'contrasena'         => Hash::make($row[4]),
        'fecha_nacimiento'   => $fecha,
        'numero_telefono'    => $row[6],
        'correo'             => $row[7],
        'fk_rol'             => 3,
    ]);

    return new Estudiante([
        'tipo_via'           => $row[8],
        'direccion'          => $row[9],
        'fecha_nacimiento'   => $fecha,
        'edad'               => (int)$row[10],
        'grado'              => $row[11],
        'curso'              => $row[12],
        'nivel_educativo'    => $row[13],
        'nacionalidad'       => $row[14],
        'correo_personal'    => $row[15],
        'acudiente'          => $row[16],
        'eps'                => $row[17],
        'sisben'             => $row[18],
        'telefono'           => $row[6],
        'fk_usuario'         => $usuario->id_usuario,
    ]);
}


    /* -------------- ---------------*/

    private function transformarFecha($valor)
{
    // Si es un número (Excel serial date)
    if (is_numeric($valor)) {
        return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($valor)->format('Y-m-d');
    }

    // Si ya es texto tipo 'YYYY-MM-DD'
    try {
        return \Carbon\Carbon::parse($valor)->format('Y-m-d');
    } catch (\Exception $e) {
        return null;
    }
}
}