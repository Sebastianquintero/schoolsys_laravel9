<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id_rol' => 1,
                'nombre' => 'Administrador',
                'estado' => 'Activo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_rol' => 2,
                'nombre' => 'Docente',
                'estado' => 'Activo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_rol' => 3,
                'nombre' => 'Estudiante',
                'estado' => 'Activo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('usuarios')->insert([
            'nombres'           => 'Admin',
            'apellidos'         => 'Principal',
            'tipo_documento'    => 'DNI',
            'numero_documento'  => '12345678',
            'correo'            => 'admin@scholsys.com',
            'contrasena'        => Hash::make('admin123'), 
            'fecha_nacimiento'  => '2000-01-01', 
            'numero_telefono'   => '9876543210',
            'fk_rol'            => 1, 
        ]);

        // ==============================
        // Estudiante 1
        $id1 = DB::table('usuarios')->insertGetId([
            'nombres'           => 'Laura',
            'apellidos'         => 'Martínez',
            'tipo_documento'    => 'Tarjeta de Identidad',
            'numero_documento'  => '56789012',
            'contrasena'        => Hash::make('estudiante123'),
            'fecha_nacimiento'  => '2010-06-15',
            'numero_telefono'   => '3101234567',
            'correo'            => 'laura@estudiante.com',
            'fk_rol'            => 3,
        ]);

        // Estudiante 2
        $id2 = DB::table('usuarios')->insertGetId([
            'nombres'           => 'Carlos',
            'apellidos'         => 'González',
            'tipo_documento'    => 'Registro Civil',
            'numero_documento'  => '67890123',
            'contrasena'        => Hash::make('carlos123'),
            'fecha_nacimiento'  => '2011-03-10',
            'numero_telefono'   => '3204567890',
            'correo'            => 'carlos@estudiante.com',
            'fk_rol'            => 3,
        ]);

        // Estudiante 3
        $id3 = DB::table('usuarios')->insertGetId([
            'nombres'           => 'Mariana',
            'apellidos'         => 'Ruiz',
            'tipo_documento'    => 'Cédula',
            'numero_documento'  => '78901234',
            'contrasena'        => Hash::make('mariana123'),
            'fecha_nacimiento'  => '2009-11-22',
            'numero_telefono'   => '3117894561',
            'correo'            => 'mariana@estudiante.com',
            'fk_rol'            => 3,
        ]);

        // ==============================
        // Estudiantes relacionados
        DB::table('estudiantes')->insert([
            [
                'fk_usuario' => $id1,
                'tipo_documento' => 'Tarjeta de Identidad',
                'nombres' => 'Laura',
                'apellidos' => 'Martínez',
                'tipo_via' => 'Calle',
                'direccion' => 'Calle 45 #10-15',
                'fecha_nacimiento' => '2010-06-15',
                'edad' => 14,
                'grado' => '7°',
                'curso' => '7-A',
                'nivel_educativo' => 'Secundaria',
                'nacionalidad' => 'Colombiana',
                'telefono' => '3101234567',
                'correo_personal' => 'laura.personal@gmail.com',
                'acudiente' => 'Luis Martínez',
                'eps' => 'Nueva EPS',
                'sisben' => 'Grupo A1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fk_usuario' => $id2,
                'tipo_documento' => 'Registro Civil',
                'nombres' => 'Carlos',
                'apellidos' => 'González',
                'tipo_via' => 'Carrera',
                'direccion' => 'Carrera 12 #34-56',
                'fecha_nacimiento' => '2011-03-10',
                'edad' => 13,
                'grado' => '6°',
                'curso' => '6-B',
                'nivel_educativo' => 'Primaria',
                'nacionalidad' => 'Colombiana',
                'telefono' => '3204567890',
                'correo_personal' => 'carlos.personal@gmail.com',
                'acudiente' => 'Ana González',
                'eps' => 'SURA',
                'sisben' => 'Grupo B2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fk_usuario' => $id3,
                'tipo_documento' => 'Cédula',
                'nombres' => 'Mariana',
                'apellidos' => 'Ruiz',
                'tipo_via' => 'Diagonal',
                'direccion' => 'Diagonal 20 #30-40',
                'fecha_nacimiento' => '2009-11-22',
                'edad' => 15,
                'grado' => '9°',
                'curso' => '9-C',
                'nivel_educativo' => 'Secundaria',
                'nacionalidad' => 'Colombiana',
                'telefono' => '3117894561',
                'correo_personal' => 'mariana.personal@gmail.com',
                'acudiente' => 'Pedro Ruiz',
                'eps' => 'Compensar',
                'sisben' => 'Grupo C1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

    }
}
