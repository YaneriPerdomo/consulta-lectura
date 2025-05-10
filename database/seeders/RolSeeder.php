<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('roles')->insert([
            [
                'rol' => 'Admin',
                'description' => 'Gestiona integralmente el sistema.'
            ],
            [
                'rol' => 'Usuario',
                'description' => 'Solicita recursos (libros, etc.) y realiza otras acciones.'
            ],
            [
                'rol' => 'Empleado',
                'description' => 'Administra una sala específica.'
            ],
            [
                'rol' => 'Moderador de comentarios',
                'description' => 'Mantener un ambiente sano y respetuoso en las secciones de comentarios'
            ]
            
        ]);
    }
}
