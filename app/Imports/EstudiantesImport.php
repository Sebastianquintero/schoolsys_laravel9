<?php

namespace App\Imports;

use App\Models\Estudiante;
use App\Models\Usuario;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EstudiantesImport implements ToModel
{
    public function model(array $row)
    {
        // Evita cabecera del CSV
        if ($row[0] === 'nombres')
            return null;

        $usuario = Usuario::create([
            'nombres' => $row[0],
            'apellidos' => $row[1],
            'tipo_documento' => $row[2],  // <-- Faltaba esta línea
            'numero_documento' => $row[3],
            'contrasena' => Hash::make($row[4]),
            'fecha_nacimiento' => Date::excelToDateTimeObject($row[5])->format('Y-m-d'),
            'numero_telefono' => $row[6],
            'correo' => $row[7],
            'fk_rol' => 3,
        ]);

        return new Estudiante([
            'direccion' => $row[8],
            'tipo_via' => $row[9],
            'fecha_nacimiento' => Date::excelToDateTimeObject($row[5])->format('Y-m-d'),
            'edad' => $row[10],
            'grado' => $row[11],
            'curso' => $row[12],
            'nivel_educativo' => $row[13],
            'nacionalidad' => $row[14],
            'telefono' => $row[6],
            'correo_personal' => $row[15],
            'acudiente' => $row[16],
            'eps' => $row[17],
            'sisben' => $row[18],
            'fk_usuario' => $usuario->id_usuario,
        ]);
    }
}
