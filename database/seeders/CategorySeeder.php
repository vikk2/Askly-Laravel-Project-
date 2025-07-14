<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Programming',
            'Technology',
            'Health',
            'Science',
            'Sports',
            'Education',
            'Business',
            'Finance',
            'Travel',
            'Food',
            'Lifestyle',
            'Entertainment',
            'Politics',
            'Environment',
            'Art',
            'History',
            'Culture',
            'Psychology',
            'Marketing',
            'Music',
            'Fashion',
            'Movies',
            'Photography',
            'Automotive',
            'Gaming',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(['name' => $category]);
        }
    }
}
