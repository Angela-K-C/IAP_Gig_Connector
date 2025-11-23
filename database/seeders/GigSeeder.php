<?php

namespace Database\Seeders;

use App\Models\Gig;
use App\Models\User;
use Illuminate\Database\Seeder;

class GigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the IDs of all users with the 'provider' role
        $providerIds = User::where('role', 'provider')->pluck('id');

        // Check if we have any providers
        if ($providerIds->isEmpty()) {
             return; 
        }

        // Create 10 sample gigs linked randomly to an existing provider
        for ($i = 0; $i < 10; $i++) {
            Gig::create([
                // Randomly select a provider's ID
                'user_id' => $providerIds->random(), 
                'title' => 'Freelance API Development Project ' . ($i + 1),
                'description' => 'We need a student to build a small REST API endpoint for our new application. Experience with Laravel Sanctum preferred.',
                'required_skills' => json_encode(['Laravel', 'REST API', 'Postman']),
                'payment_type' => 'fixed',
                'payment_amount' => 500.00,
                'duration' => '2 weeks',
                'location' => 'Remote',
                'is_remote' => true,
                'application_deadline' => now()->addDays(10),
                'status' => 'open',
            ]);
        }
    }
}