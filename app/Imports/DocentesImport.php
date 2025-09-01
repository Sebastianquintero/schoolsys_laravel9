<?php

namespace App\Imports;

use App\Models\Docente;
use App\Models\Usuario;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class DocentesImport implements ToCollection, WithHeadingRow
{
    private int $importados = 0;
    private int $omitidos = 0;




    public function collection(Collection $rows)
    {
        return activity()->withoutLogs(function () use ($rows) {
        foreach ($rows as $row) {
            if (empty($row['nombres']) || empty($row['correo'])) {
                $this->omitidos++;
                continue;
            }

            // Verificar si ya existe un usuario con mismo correo o documento
            $existe = Usuario::where('correo', $row['correo'])
                ->orWhere('numero_documento', $row['numero_documento'])
                ->first();

            if ($existe) {
                $this->omitidos++;
                continue;
            }
            $fecha = $this->transformarFecha($row['fecha_nacimiento']);
            if (!$fecha) {
                $this->omitidos++;
                return null;
            }


            $usuario = Usuario::updateOrCreate(
                ['correo' => $row['correo']], // condición para buscar
                [ // valores para crear o actualizar
                    'nombres' => $row['nombres'],
                    'apellidos' => $row['apellidos'],
                    'tipo_documento' => $row['tipo_documento'],
                    'numero_documento' => $row['numero_documento'],
                    'contrasena' => bcrypt('12345678'),
                    'fk_rol' => 2,
                    'fk_colegio' => auth()->user()->fk_colegio,
                    'fecha_nacimiento' => $fecha,
                    'numero_telefono' => $row['numero_telefono'],
                ]
            );
            $fechaInicio = $this->transformarFecha($row['fecha_inicio']);
            $fechaFin = $this->transformarFecha($row['fecha_fin']);

            if (!$fechaInicio || !$fechaFin) {
                $this->omitidos++;
                continue;
            }

            Docente::updateOrCreate(
                ['fk_usuario' => $usuario->id_usuario],
                [
                    'cargo' => $row['cargo'],
                    'tipo_contrato' => $row['tipo_contrato'],
                    'duracion' => $row['duracion'],
                    'fecha_inicio' => $fechaInicio,
                    'fecha_fin' => $fechaFin,
                    'correo_personal' => $row['correo_personal'],
                ]
            );

            $this->importados++;
        }
        });

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
