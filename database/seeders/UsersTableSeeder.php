<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Luna',
                'email' => 'luna.dheere@student.ehb.be',
                'password' => Hash::make('Password!321'),
                'is_admin' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'date_birth' => '2005-12-29',
                'abt_me' => 'I am the creator of this site!',
                'remember_token' => null,
                'picture' => 'profile_pictures/luna.jpg',
            ],
            [
                'name' => 'Joske',
                'email' => 'joske@student.ehb.be',
                'password' => Hash::make('Password!321'),
                'is_admin' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'date_birth' => null, // Optional
                'abt_me' => null, // Optional
                'remember_token' => null, // Explicitly set
                'picture' => 'profile_pictures/IMG_5778.jpg',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@ehb.be',
                'password' => Hash::make('Password!321'),
                'is_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'date_birth' => null, // Optional
                'abt_me' => null, // Optional
                'remember_token' => null, // Explicitly set
                'picture' => null, // Optional
            ],
        ]);
    }
}
