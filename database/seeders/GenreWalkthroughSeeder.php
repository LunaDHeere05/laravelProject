<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;
use App\Models\Walkthrough;


class GenreWalkthroughSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $walkthroughs = Walkthrough::all();
        $genres = Genre::all();

        $data = [];

        foreach ($walkthroughs as $walkthrough) {
            $assignedGenres = $genres->random(rand(2, 4))->pluck('id');

            foreach ($assignedGenres as $genreId) {
                $data[] = [
                    'walkthrough_id' => $walkthrough->id,
                    'genre_id' => $genreId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('genre_walkthrough')->insert($data);
    }
}