<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;
use App\Models\Docente;

class DocentesExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Docente::with('usuario')
            ->whereHas('usuario', function ($q) {
                $q->where('fk_colegio', auth()->user()->fk_colegio);
            })
            ->get()
            ->map(function ($d) {
                return [
                    'tipo_documento' => $d->usuario->tipo_documento ?? '',
                    'numero_documento' => $d->usuario->numero_documento ?? '',
                    'nombres' => $d->usuario->nombres ?? '',
                    'apellidos' => $d->usuario->apellidos ?? '',
                    'correo' => $d->usuario->correo ?? '',
                    'correo_personal' => $d->correo_personal ?? '',
                    'telefono' => $d->telefono ?? '',
                    'fecha_nacimiento' => $d->usuario->fecha_nacimiento ?? '',
                    'edad' => optional($d->usuario->fecha_nacimiento) ? \Carbon\Carbon::parse($d->usuario->fecha_nacimiento)->age : '',
                    'cargo' => $d->cargo ?? '',
                    'tipo_contrato' => $d->tipo_contrato ?? '',
                    'duracion' => $d->duracion ?? '',
                    'fecha_inicio' => $d->fecha_inicio ?? '',
                    'fecha_fin' => $d->fecha_fin ?? '',
                ];
            });

    }
    public function headings(): array
    {
        return [
            'Tipo Documento',
            'Número Documento',
            'Nombres',
            'Apellidos',
            'Correo Institucional',
            'Correo Personal',
            'Teléfono',
            'Fecha Nacimiento',
            'Edad',
            'Cargo',
            'Tipo Contrato',
            'Duración',
            'Fecha Inicio',
            'Fecha Fin',
        ];
    }
}
