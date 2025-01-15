<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            [
                'name' => 'Action',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adventure',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'RPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Simulation',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Strategy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sports',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Puzzle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Horror',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Survival',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MMORPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'JRPG',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}