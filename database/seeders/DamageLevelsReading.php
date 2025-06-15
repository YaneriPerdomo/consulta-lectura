<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DamageLevelsReading extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('damage_levels_reading')->insert([
            [
                'damage_level_reading' => 'Desgaste leve',
                'description' => 'Signos de uso normales: cubierta ligeramente rayada o doblada, algunas páginas con puntas dobladas. Lectura no afectada.',
            ],
            [
                'damage_level_reading' => 'Desgaste moderado',
                'description' => 'Cubierta o lomo con arrugas o pequeños desgarros. Algunas páginas sueltas, manchas menores o subrayados/anotaciones con lápiz. Lectura posible pero con imperfecciones.',
            ],
            [
                'damage_level_reading' => 'Desgaste significativo',
                'description' => 'Lomo despegado, falta la portada o contraportada, varias páginas sueltas, manchas grandes, texto ilegible en algunas zonas debido a daños por líquidos o roturas. Lectura dificultosa.',
            ],
            [
                'damage_level_reading' => 'Incompleto / Faltan páginas',
                'description' => 'Falta una sección significativa de páginas, capítulos completos, o elementos esenciales para la comprensión del contenido.',
            ],
            [
                'damage_level_reading' => 'Dañado por agua',
                'description' => 'Signos evidentes de daño por líquidos: papel ondulado, manchas, moho o adherencia de páginas.',
            ],
            [
                'damage_level_reading' => 'Daño por vandalismo',
                'description' => 'Rayones, garabatos, arranques de páginas intencionados o alteraciones que impiden la lectura o el uso adecuado.',
            ]/*,
           [
               'damage_level_reading' => 'Requiere reparación',
               'description' => 'Daño considerable que impide su préstamo y requiere intervención profesional (encuadernación, restauración).',
           ],
           [
               'damage_level_reading' => 'Ilegible / Insalvable',
               'description' => 'El libro está tan dañado que es imposible de leer o reparar de forma económica.',
           ], */
            ,
            [
                'damage_level_reading' => 'Daños por insectos',
                'description' => 'Carcomas, polillas y otros insectos pueden causar agujeros, perforaciones y daños a la encuadernación y las páginas.',
            ],
            [
                'damage_level_reading' => 'Daños por químicos',
                'description' => 'La exposición a productos químicos, como limpiadores de uso doméstico, puede causar manchas, decoloraciones y deterioro del papel.',
            ],
            [
                'damage_level_reading' => 'Daños por hongos y bacterias',
                'description' => 'Estos microorganismos pueden proliferar en ambientes húmedos y cálidos, causando manchas, decoloraciones y deterioro del papel.',
            ],
            [
                'damage_level_reading' => 'Otros',

            ]
        ]);
    }
}
