<?php

namespace App\Imports;

use App\Models\Estudiante;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EstudiantesImport implements ToModel, WithHeadingRow
{
    private int $importados = 0;
    private int $omitidos = 0;

    public function model(array $row)
    {
        // Ignorar fila vacía o inválida
        if (empty($row['nombres']) || empty($row['correo'])) {
            $this->omitidos++;
            return null;
        }

        $fecha = $this->transformarFecha($row['fecha_nacimiento']);
        if (!$fecha) {
            $this->omitidos++;
            return null;
        }

        $admin = Auth::user();

        $existe = Usuario::where('correo', $row['correo'])
            ->orWhere('numero_documento', $row['numero_documento'])
            ->first();

        if ($existe) {
            $this->omitidos++;
            return null;
        }

        $usuario = Usuario::updateOrCreate(
            [
                'correo' => $row['correo']
            ],
            [
                'nombres' => $row['nombres'],
                'apellidos' => $row['apellidos'],
                'tipo_documento' => $row['tipo_documento'],
                'numero_documento' => $row['numero_documento'],
                'contrasena' => Hash::make($row['contrasena']),
                'fecha_nacimiento' => $fecha,
                'numero_telefono' => $row['numero_telefono'],
                'fk_rol' => 3,
                'fk_colegio' => $admin->fk_colegio ?: 1, // Asignar colegio del usuario autenticado o 1 por defecto
            ]
        );

        Estudiante::updateOrCreate(
            ['fk_usuario' => $usuario->id_usuario],
            [
                'tipo_via' => $row['tipo_via'],
                'direccion' => $row['direccion'],
                'fecha_nacimiento' => $fecha,
                'edad' => $row['edad'],
                'grado' => $row['grado'],
                'curso' => $row['curso'],
                'nivel_educativo' => $row['nivel_educativo'],
                'nacionalidad' => $row['nacionalidad'],
                'correo_personal' => $row['correo_personal'],
                'acudiente' => $row['acudiente'],
                'eps' => $row['eps'],
                'sisben' => $row['sisben'],
                'telefono' => $row['numero_telefono'],
                'fk_colegio' => $admin->fk_colegio ?: 1, // Asignar colegio del usuario autenticado o 1 por defecto
            ]
        );

        $this->importados++;
        return null;
    }

    public function getImportados(): int
    {
        return $this->importados;
    }

    public function getOmitidos(): int
    {
        return $this->omitidos;
    }

    private function transformarFecha($valor)
    {
        if (is_numeric($valor)) {
            return Date::excelToDateTimeObject($valor)->format('Y-m-d');
        }

        try {
            return Carbon::parse($valor)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}