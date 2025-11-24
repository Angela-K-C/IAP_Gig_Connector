<?php

namespace Database\Seeders;

use App\Models\Gig;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class GigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gig::create([
            'provider_id' => 2,
            'title' => 'Website Development',
            'description' => 'Build a responsive website for small businesses.',
            'category_id' => 1, // assuming 1 = Web Development
            'location' => 'Remote',
            'payment_type' => 'fixed',
            'payment_amount' => 500.00,
            'duration' => '2 weeks',
            'application_deadline' => Carbon::now()->addWeeks(2),
        ]);

        Gig::create([
            'provider_id' => 2,
            'title' => 'Social Media Marketing',
            'description' => 'Manage social media campaigns for brand awareness.',
            'category_id' => 4, // assuming 4 = Digital Marketing
            'location' => 'Remote',
            'payment_type' => 'hourly',
            'payment_amount' => 20.00,
            'duration' => '1 month',
            'application_deadline' => Carbon::now()->addWeeks(3),
        ]);

        Gig::create([
            'provider_id' => 2,
            'title' => 'SEO Optimization',
            'description' => 'Improve website ranking in search engines.',
            'category_id' => 4, // Digital Marketing
            'location' => 'Remote',
            'payment_type' => 'fixed',
            'payment_amount' => 300.00,
            'duration' => '3 weeks',
            'application_deadline' => Carbon::now()->addWeeks(4),
        ]);
    }
}
