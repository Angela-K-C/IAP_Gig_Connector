<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- 1. ADMIN USER (TEST ACCOUNT) ---
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // --- 2. PROVIDER USER (TEST ACCOUNT + PROFILE) ---
        $providerUser = User::create([
            'name' => 'Global Tech Corp',
            'email' => 'provider@test.com',
            'password' => Hash::make('password'),
            'role' => 'provider',
        ]);
        
        // Create the associated provider_profile row
        $providerUser->provider()->create([
            'organization_name' => $providerUser->name,
            'contact_number' => '0711123456',
            'about_provider' => 'Leading company specializing in remote tech solutions and development gigs.',
            'is_verified' => true,
        ]);

        // --- 3. STUDENT USER (TEST ACCOUNT + PROFILE) ---
        $studentUser = User::create([
            'name' => 'Alice Student',
            'email' => 'student@test.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);
        
        // Create the associated student_profile row
        $studentUser->student()->create([
            'university' => 'University of Nairobi',
            'year_of_study' => '4th Year',
            'field_of_study' => 'Software Engineering',
            'skills' => json_encode(['Laravel', 'Vue.js', 'API Development']),
            'bio' => 'Highly motivated student looking for remote internship opportunities.',
            'availability_remote' => true,
            'profile_completion' => 100,
        ]);
        
        // --- 4. BULK FAKE USERS ---
        
        // Create 5 more fake Providers
        User::factory(5)->create(['role' => 'provider'])->each(function ($user) {
            $user->provider()->create([
                'organization_name' => $user->name . ' Inc.',
                'about_provider' => Str::random(50),
                'is_verified' => true,
            ]);
        });

        // Create 5 more fake Students
        User::factory(5)->create(['role' => 'student'])->each(function ($user) {
            $user->student()->create([
                'university' => 'Kenyatta University',
                'skills' => json_encode(['Python', 'Data Analysis', 'SQL']),
                'profile_completion' => 75,
            ]);
        });
    }
}