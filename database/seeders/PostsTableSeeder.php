<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'The Epic Journey of Clive Rosfield in Final Fantasy XVI',
            'content' => 'Final Fantasy XVI brings players into a world of stunning visuals and deep, immersive storytelling. Follow the journey of Clive Rosfield, the game\'s protagonist, as he embarks on a quest of revenge, redemption, and self-discovery. Set in a land where powerful icons (summons) shape the fate of nations, Clive\'s quest will take him through epic battles, tragic losses, and unexpected alliances. The game introduces a unique action-focused combat system while keeping the deep lore and narrative elements that fans of the franchise love.',
            'cover_picture' => 'posts/FFXVI.jpeg',
            'user_id' => 1, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        Post::create([
            'title' => 'Sly Cooper: Thieves in Time – A Return to the Heist of a Lifetime',
            'content' => 'Sly Cooper: Thieves in Time takes players back to the world of the beloved raccoon thief, Sly. After the mysterious disappearance of his ancestors\' pages in the Thievius Raccoonus, Sly and his trusty gang must travel through time to restore the missing pages and save the world from a growing threat. The game blends humor, stealth mechanics, and classic platforming gameplay in a way only Sly Cooper can. The vibrant world and unforgettable characters make this a nostalgic return to a beloved franchise.',
            'cover_picture' => 'posts/Sly_cooper.png',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        Post::create([
            'title' => 'Uncharted: A Legacy of Adventure, Treasure, and Danger',
            'content' => 'Uncharted has long been known as one of the best action-adventure games of all time. Nathan Drake, the fearless treasure hunter, has traveled to the farthest corners of the world, unearthing priceless artifacts, uncovering hidden secrets, and escaping countless life-or-death situations. From the original game to its thrilling sequels, Uncharted is a testament to the power of storytelling in video games. Its perfect blend of action, exploration, and puzzle-solving has made it a fan favorite and a cornerstone of the PlayStation library.',
            'cover_picture' => 'posts/Uncharted.png',
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
