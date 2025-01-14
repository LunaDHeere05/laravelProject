<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Walkthrough;

class WalkthroughsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('walkthroughs')->insert([
            [
                'title' => 'Final fantasy XVI walkthrough',
                'content' => "How to Master Combat in Final Fantasy 16: In this guide, we'll explore the basics of combat in Final Fantasy 16, including the importance of mastering your weapons, utilizing abilities, and chaining attacks for maximum damage. Whether you're playing as Clive or a summoner, learning combos will make battles smoother and more enjoyable.",
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'cover_picture' => 'walkthroughs/FFXVI.jpeg',
            ],
            [
                'title' => 'Lies of P walkthrough',
                'content' => "In **Lies of P**, the prologue sets the tone for a dark, twisted world inspired by the tale of Pinocchio. You'll begin your journey in the city of Krat, a once-thriving metropolis now plagued by madness and monstrous beings. The first objective is to get familiar with the basic controls, combat, and environment. You'll need to defeat your first set of enemies and reach the St. Frangelico Cathedral, where your real adventure begins. Keep an eye out for useful items and upgrade materials along the way to bolster your abilities.",
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'cover_picture' => 'walkthroughs/Lies_of_P.jpg',
            ],
            [
                'title' => 'Horizon: zero dawn walkthrough',
                'content' => "In **Horizon Zero Dawn**, you start as Aloy, a young hunter from the Nora tribe, in a lush post-apocalyptic world dominated by robotic creatures. Your journey begins with a simple task: learning the basic mechanics of combat, stealth, and crafting. As you explore, you’ll come across different machines, from small watchers to larger threats like the Striders. The main objective early on is to pass the proving ceremony and learn more about your mysterious past. Along the way, gather resources, craft ammunition, and take down machines for their parts to upgrade your gear.",
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'cover_picture' => 'walkthroughs/Horizon_zeroDawn.jpeg',
            ],
        ]);
    }
}