<?php

namespace Database\Seeders;

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;

class IdentityCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('identity_cards')->insert(
            [
                [
                    'identity_card' => 'Venezolano cedulado',
                    'description' => 'Cédula de identidad para ciudadanos venezolanos',
                ],
                [
                    'identity_card' => 'Extranjero cedulado',
                    'description' => 'Cédula de identidad para ciudadanos extranjeros residentes',
                ],
                [
                    'identity_card' => 'Pasaporte',
                    'description' => 'Documento de viaje internacional',
                ],
            ]
        );
    }
}
