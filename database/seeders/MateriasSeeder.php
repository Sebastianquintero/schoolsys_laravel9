<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materias = [
            [
                'nombre' => 'Matemáticas',
                'descripcion' => 'Estudio de aritmética, álgebra, geometría y cálculo.',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Español',
                'descripcion' => 'Lengua castellana, gramática, ortografía y literatura.',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Inglés',
                'descripcion' => 'Aprendizaje del idioma inglés, comprensión y producción.',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Ciencias Naturales',
                'descripcion' => 'Estudio de biología, física y química básica.',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Sociales',
                'descripcion' => 'Historia, geografía, constitución política y democracia.',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Ética y Valores',
                'descripcion' => 'Formación en valores, ética ciudadana y convivencia.',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Religión',
                'descripcion' => 'Conocimiento de religiones y formación espiritual.',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Educación Física',
                'descripcion' => 'Desarrollo físico, deportes y actividades recreativas.',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Educación Artística',
                'descripcion' => 'Artes plásticas, música, danza y teatro.',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Tecnología e Informática',
                'descripcion' => 'Uso de herramientas tecnológicas y competencias digitales.',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Física',
                'descripcion' => 'Estudio de los fenómenos naturales, mecánica, electricidad, ondas.',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Química',
                'descripcion' => 'Composición y transformación de la materia.',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Biología',
                'descripcion' => 'Estudio de los seres vivos y sus procesos vitales.',
                'estado' => 'Activo',
            ],
        ];

        DB::table('materias')->insert($materias);
    }
}
