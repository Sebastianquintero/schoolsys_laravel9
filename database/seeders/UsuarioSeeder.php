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
        DB::table('colegios')->insert([
            [
                'id_colegio' => 1,
                'nombre' => 'Colegio Enrique Olaya Herrera',
                'direccion' => 'Calle 123 #45-67',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_colegio' => 2,
                'nombre' => 'Colegio San Juan Bosco',
                'direccion' => 'Carrera 89 #12-34',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_colegio' => 3,
                'nombre' => 'Colegio Santa María',
                'direccion' => 'Diagonal 56 #78-90',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('usuarios')->insert([
            [
                'nombres' => 'Admin',
                'apellidos' => 'Principal',
                'tipo_documento' => 'DNI',
                'numero_documento' => '12345678',
                'correo' => 'admin@scholsys.com',
                'contrasena' => Hash::make('admin123'),
                'fecha_nacimiento' => '2000-01-01',
                'numero_telefono' => '9876543210',
                'fk_rol' => 1,
                'fk_colegio' => 1, 
            ],
            [
                'nombres' => 'Juan',
                'apellidos' => 'Pérez',
                'tipo_documento' => 'Cédula',
                'numero_documento' => '123456789',
                'correo' => 'sebastquinter87@gmail.com',
                'contrasena' => Hash::make('juan123'),
                'fecha_nacimiento' => '1995-05-20',
                'numero_telefono' => '3001234567',
                'fk_rol' => 1,
                'fk_colegio' => 1, 
            ],
            [
                'nombres' => 'Cristian',
                'apellidos' => 'Quintero',
                'tipo_documento' => 'Cédula',
                'numero_documento' => '987654321',
                'correo' => 'cristianerodriguez607@gmail.com',
                'contrasena' => Hash::make('cristian123'),
                'fecha_nacimiento' => '1998-08-15',
                'numero_telefono' => '3109876543',
                'fk_rol' => 1,
                'fk_colegio' => 1, 
            ],
            [ // Docente
                'nombres' => 'Cris',
                'apellidos' => 'Argotty',
                'tipo_documento' => 'Cédula',
                'numero_documento' => '234567890',
                'correo' => 'cristianmonito100@gmail.com',
                'contrasena' => Hash::make('cris123'),
                'fecha_nacimiento' => '1999-09-09',
                'numero_telefono' => '3201234567',
                'fk_rol' => 2,
                'fk_colegio' => 1,
            ]
        ]);
        
        
    }
}
