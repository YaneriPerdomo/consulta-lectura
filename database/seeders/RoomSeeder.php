<?php

namespace Database\Seeders;

use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('rooms')->insert([
            'room' => 'Sala HEMEROTECA Ulices Acosta ',
            'description' => 'Dedicada a la música, su historia y evaluación en el tiempo y una gran variedad de colección de soporte sonoro como discos de acetato, vinil, cintas de carrete abierto, cassette, CD, DVD.',
       ]);
    }
}
