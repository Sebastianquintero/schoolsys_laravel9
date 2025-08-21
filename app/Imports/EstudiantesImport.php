<?php

namespace App\Imports;

use App\Models\Estudiante;
use App\Models\Usuario;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class EstudiantesImport implements ToModel, WithHeadingRow
{
    private int $importados = 0;
    private int $omitidos = 0;

public function model(array $row)
{
    // Ignorar fila vacía o inválida
    if (empty($row['nombres']) || empty($row['correo'])) {
        $this->omitidos++;
        Log::warning('Fila omitida por datos vacíos', $row);
        return null;
    }

    // Transformar fecha
    $fecha = $this->transformarFecha($row['fecha_nacimiento']);
    if (!$fecha) {
        $this->omitidos++;
        Log::warning("Fecha inválida en fila", $row);
        return null;
    }

    $admin = Auth::user();
    Log::info("Usuario administrador detectado", ['id' => $admin->id_usuario, 'colegio' => $admin->fk_colegio]);

    // Validar duplicados
    $existe = Usuario::where('correo', $row['correo'])
        ->orWhere('numero_documento', $row['numero_documento'])
        ->first();

    if ($existe) {
        $this->omitidos++;
        Log::info("Usuario ya existe, se omite", [
            'correo' => $row['correo'],
            'documento' => $row['numero_documento']
        ]);
        return null;
    }

    // Crear o actualizar usuario
    $usuario = Usuario::updateOrCreate(
        ['correo' => $row['correo']],
        [
            'nombres' => $row['nombres'],
            'apellidos' => $row['apellidos'],
            'tipo_documento' => $row['tipo_documento'],
            'numero_documento' => $row['numero_documento'],
            'contrasena' => Hash::make($row['contrasena']),
            'fecha_nacimiento' => $fecha,
            'numero_telefono' => $row['numero_telefono'],
            'fk_rol' => 3,
            'fk_colegio' => $admin->fk_colegio ?: 1,
        ]
    );

    Log::info("Usuario creado/actualizado correctamente", ['id_usuario' => $usuario->id_usuario]);

    // Buscar curso
$numeroCurso = intval($row['numero_curso']);

$curso = Curso::where('numero_curso', $numeroCurso)->first();

if (!$curso) {
    Log::warning("Curso no encontrado en BD", [
        'numero_curso_excel' => $row['numero_curso'],
        'numero_curso_cast'  => $numeroCurso,
    ]);
}

    // Crear o actualizar estudiante
    Estudiante::updateOrCreate(
        ['fk_usuario' => $usuario->id_usuario],
        [
            'tipo_via' => $row['tipo_via'],
            'direccion' => $row['direccion'],
            'fecha_nacimiento' => $fecha,
            'edad' => $row['edad'],
            'grado' => $row['grado'],
            'fk_curso' => $row['numero_curso'],
            'nivel_educativo' => $row['nivel_educativo'],
            'nacionalidad' => $row['nacionalidad'],
            'correo_personal' => $row['correo_personal'],
            'acudiente' => $row['acudiente'],
            'eps' => $row['eps'],
            'sisben' => $row['sisben'],
            'telefono' => $row['numero_telefono'],
            'fk_colegio' => $admin->fk_colegio ?: 1,
        ]
    );

    Log::info("Estudiante creado/actualizado correctamente", ['fk_usuario' => $usuario->id_usuario]);

    $this->importados++;
    Log::info("Fila importada correctamente", ['total_importados' => $this->importados]);

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