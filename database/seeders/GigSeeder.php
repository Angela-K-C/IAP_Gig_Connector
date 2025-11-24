<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gig;
use App\Models\Provider;
use App\Models\Category;
use Carbon\Carbon;

class GigSeeder extends Seeder
{
    public function run(): void
    {
        // $categories = Category::all();

        // Gig::create([
        //     'provider_id'          => 1,
        //     'title'                => 'Social Media Manager',
        //     'description'          => 'Manage social media posts, analytics, and engagement.',
        //     'payment_type'         => 'fixed',
        //     'payment_amount'       => 300.00,
        //     'duration'             => '1 Month',
        //     'application_deadline' => Carbon::now()->addDays(10),
        //     'status'               => 'open',
        //     'location'             => 'Nairobi',
        //     'is_open'              => true,
        //     'category_id'          => $categories->random()->id,
        // ]);

        // Gig::create([
        //     'provider_id'          => 1,
        //     'title'                => 'Web Design Intern',
        //     'description'          => 'Assist in front-end development using HTML, CSS & Tailwind.',
        //     'payment_type'         => 'hourly',
        //     'payment_amount'       => 5.00,
        //     'duration'             => '3 Months',
        //     'application_deadline' => Carbon::now()->addDays(20),
        //     'status'               => 'open',
        //     'location'             => 'Remote',
        //     'is_open'              => true,
        //     'category_id'          => $categories->random()->id,
        // ]);
    }
}
