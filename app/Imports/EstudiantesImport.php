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
        // ---- Resolver/crear el curso ----
        $numeroExcel = $row['numero_curso'] ?? null;

        // Normaliza número de curso (Excel puede mandar "501.0")
        $numeroNormalizado = null;
        if (!is_null($numeroExcel) && $numeroExcel !== '') {
            $numeroNormalizado = trim((string) $numeroExcel);
            if (str_contains($numeroNormalizado, '.')) {
                $numeroNormalizado = strstr($numeroNormalizado, '.', true);
            }
        }

        $colegioId = $admin->fk_colegio ?: 1;   // ya tienes $admin arriba
        $cursoId = null;

        if ($numeroNormalizado) {
            $curso = Curso::firstOrCreate(
                [
                    'fk_colegio' => $colegioId,           // <- parte del índice único
                    'numero_curso' => $numeroNormalizado,   // <- parte del índice único
                ],
                [
                    'nombre_curso' => $row['grado'] ?? ('Curso ' . $numeroNormalizado),
                    'descripcion' => 'Importado automáticamente',
                    'estado' => 'Activo',
                ]
            );

            $cursoId = $curso->id_curso;

            Log::info("Curso resuelto/creado", [
                'colegio' => $colegioId,
                'numero_curso' => $numeroNormalizado,
                'id_curso' => $cursoId,
            ]);
        } else {
            Log::warning("Fila sin numero_curso válido", $row);
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
                'fk_curso' => $cursoId,
                'nivel_educativo' => $row['nivel_educativo'],
                'nacionalidad' => $row['nacionalidad'],
                'correo_personal' => $row['correo_personal'],
                'acudiente' => $row['acudiente'],
                'eps' => $row['eps'],
                'sisben' => $row['sisben'],
                'telefono' => $row['numero_telefono'],
                'fk_colegio' => $colegioId,
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