<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types_state')->insert([
            [
                'type_state' => 'Disponible',
            ],
            [
                'type_state' => 'Prestado',
            ],
            [
                'type_state' => 'En Reparación',
            ],
            [
                'type_state' => 'Dañado',
            ],
            [
                'type_state' => 'Extraviado',
            ],
        ]);
    }
}
