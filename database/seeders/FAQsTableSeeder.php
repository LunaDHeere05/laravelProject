<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\FAQ;

class FAQsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
    FAQ::create([
        'question' => 'What is Gamer\'s Chronicles?',
        'answer' => 'Gamer\'s Chronicles is your go-to source for the latest gaming news, walkthroughs, and personal gaming experiences. Stay updated with the most recent news in the gaming world.',
        'category' => 'General',
    ]);

    FAQ::create([
        'question' => 'How can I contact Gamer\'s Chronicles?',
        'answer' => 'You can reach out to us through the "Contact" page on our website. We are always happy to hear from our community.',
        'category' => 'General',
    ]);

    // Category: Account & Membership
    FAQ::create([
        'question' => 'Do I need an account to read articles on Gamer\'s Chronicles?',
        'answer' => 'No, you can read news posts without an account.',
        'category' => 'Account & Membership',
    ]);

    FAQ::create([
        'question' => 'How do I reset my Gamer\'s Chronicles account password?',
        'answer' => 'To reset your password, visit the login page and click on the "Forgot Password" link. Follow the instructions sent to your email to reset it.',
        'category' => 'Account & Membership',
    ]);

    // Category: Walkthroughs & Content
    FAQ::create([
        'question' => 'Where can I find walkthroughs on Gamer\'s Chronicles?',
        'answer' => 'Walkthroughs can be found on the "Walkthroughs" section of the homepage of the website. We provide step-by-step guides to help you through some of the most challenging games.',
        'category' => 'Walkthroughs & Content',
    ]);

    FAQ::create([
        'question' => 'How can I submit my own walkthrough?',
        'answer' => 'You can submit your own walkthrough by going to the "Walkthroughs" section of the website. You do not need an admin position to create a walkthrough. However, if you wish to write news posts, you will need to be granted an admin role by an administrator. Contact us through the "Contact" page for more information on submitting content.',
        'category' => 'Walkthroughs & Content',
    ]);

    FAQ::create([
        'question' => 'How do I stay updated on the latest news?',
        'answer' => 'You can stay up to date with the latest news by visiting the "Recent News" section on our homepage. You can also follow us on social media for instant updates.',
        'category' => 'Walkthroughs & Content',
    ]);
    }
}
