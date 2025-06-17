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

        /*DB::table('usuarios')->insert([
            'nombres'           => 'Admin',
            'apellidos'         => 'Principal',
            'tipo_documento'    => 'DNI',
            'numero_documento'  => '12345678',
            'correo'            => 'admin@scholsys.com',
            'contrasena'        => Hash::make('admin123'), // esta es la clave que puedes usar
            'fecha_nacimiento'  => '2000-01-01',
            'numero_telefono'   => '9876543210',
            'fk_rol'            => 1, // asegúrate que exista el rol ID 1 en la tabla roles
        ]);*/
    }
}
