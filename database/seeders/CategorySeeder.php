<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Web Development',
            'Graphic Design',
            'Content Writing',
            'Digital Marketing',
            'Mobile App Development',
            'Video Editing',
            'Data Entry',
            'Customer Support',
            'SEO',
            'Finance & Accounting',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
