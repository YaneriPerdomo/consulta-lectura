<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;


class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('jobs')->insert([
            [
                'job' => 'Auxiliar de Biblioteca',
                'slug' => 'auxiliar-de-biblioteca'
            ],
            [
                'job' => 'Asistente de Biblioteca',
                'slug' => 'asistente-de-biblioteca'
            ],
            [
                'job' => 'Bibliotecario/a',
                'slug' => 'bibliotecario-/-a'
            ],
            [
                'job' => 'Personal de Mostrador',
                'slug' => 'personal-de-mostrador'
            ],
        ]);
    }
}
