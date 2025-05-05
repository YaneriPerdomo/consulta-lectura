<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('avatars')->insert([
            [
                'img' => 'default'
            ],
            [
                'img' => 'boy'
            ],
            [
                'img' => 'girl'
            ],
            [
                'img' => 'dinosaur'
            ],
            [
                'img' => 'young-snow-m'
            ],
            [
                'img' => 'young-snow-f'
            ]
        ]);
    }
}
