<?php

namespace Database\Seeders;

use App\Models\Gig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class GigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 3 random gigs (for now)
        Gig::create([
            'provider_id' => 1,
            'title' => 'Website Development',
            'description' => 'Build a responsive website for small businesses.',
            'required_skills' => 'HTML,CSS,JavaScript,Laravel',
            'payment_type' => 'fixed',
            'payment_amount' => 500.00,
            'duration' => '2 weeks',
            'application_deadline' => Carbon::now()->addWeeks(2),
            'status' => 'open',
        ]);

        Gig::create([
            'provider_id' => 2,
            'title' => 'Social Media Marketing',
            'description' => 'Manage social media campaigns for brand awareness.',
            'required_skills' => 'Facebook Ads,Instagram Marketing,Content Creation',
            'payment_type' => 'hourly',
            'payment_amount' => 20.00,
            'duration' => '1 month',
            'application_deadline' => Carbon::now()->addWeeks(3),
            'status' => 'open',
        ]);

        Gig::create([
            'provider_id' => 1,
            'title' => 'SEO Optimization',
            'description' => 'Improve website ranking in search engines.',
            'required_skills' => 'SEO,Google Analytics,Content Writing',
            'payment_type' => 'fixed',
            'payment_amount' => 300.00,
            'duration' => '3 weeks',
            'application_deadline' => Carbon::now()->addWeeks(4),
            'status' => 'open',
        ]);
    }
}
