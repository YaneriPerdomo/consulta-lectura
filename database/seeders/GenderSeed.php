<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;

//Nombre: GendersTableSeeder
class GenderSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table(table: 'genders')->insert([
            [
                'gender' => 'F',
            ],
            [
                'gender' => 'M',
            ]
        ]);
    
    }
}
