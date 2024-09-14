<?php

namespace Database\Seeders;

use App\Models\TaskCategory;
use Illuminate\Database\Seeder;

class TaskCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Beach Cleanup',
            'Lifeguard Duties',
            'Equipment Maintenance',
            'Event Planning',
            'Environmental Monitoring',
            'Water Quality Testing',
            'Visitor Education',
            'Wildlife Conservation',
            'Facility Management',
            'Emergency Response'
        ];

        foreach ($categories as $category) {
            TaskCategory::create(['name' => $category]);
        }
    }
}
