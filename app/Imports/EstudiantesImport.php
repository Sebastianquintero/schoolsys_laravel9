<?php

namespace App\Imports;

use App\Models\Estudiante;
use App\Models\Usuario;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Str;

class EstudiantesImport implements ToModel
{
    public function model(array $row)
    {
       // Saltar cabecera
    if (Str::lower(trim($row[0])) === 'nombres') return null;

    // Convertir todo a string y limpiar espacios
    $row = array_map(fn($val) => trim((string)$val), $row);

    // Crear usuario
    $usuario = Usuario::create([
        'nombres'            => $row[0],
        'apellidos'          => $row[1],
        'tipo_documento'     => $row[2],
        'numero_documento'   => $row[3],
        'contrasena'         => Hash::make($row[4]),
        'fecha_nacimiento'   => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5])->format('Y-m-d'),
        'numero_telefono'    => $row[6],
        'correo'             => $row[7],
        'fk_rol'             => 3,
    ]);

    // Crear estudiante
    return new Estudiante([
        'tipo_via'           => $row[8],
        'direccion'          => $row[9],
        'fecha_nacimiento'   => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5])->format('Y-m-d'),
        'edad'               => (int)$row[10],
        'grado'              => $row[11],
        'curso'              => $row[12],
        'nivel_educativo'    => $row[13],
        'nacionalidad'       => $row[14],
        'correo_personal'    => $row[15],
        'acudiente'          => $row[16],
        'eps'                => $row[17],
        'sisben'             => $row[18],
        'telefono'           => $row[6], // o puede venir duplicado
        'fk_usuario'         => $usuario->id_usuario,
    ]);

    }
}