<?php

namespace Database\Seeders;

use App\Models\TaskCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = TaskCategory::pluck('id')->toArray();

        $tasks = [
            [
                'title' => 'Complete project proposal',
                'description' => 'Draft and finalize the proposal for the new client project',
                'completed' => true,
            ],
            [
                'title' => 'Schedule team meeting',
                'description' => 'Set up a time for the weekly team sync',
                'completed' => true,
            ],
            [
                'title' => 'Review code changes',
                'description' => 'Go through pull requests and provide feedback',
                'completed' => false,
            ],
            [
                'title' => 'Update documentation',
                'description' => 'Revise the API documentation with recent changes',
                'completed' => false,
            ],
            [
                'title' => 'Prepare for client presentation',
                'description' => 'Create slides and talking points for tomorrow\'s client meeting',
                'completed' => false,
            ],
            [
                'title' => 'Fix bug in login system',
                'description' => 'Investigate and resolve the reported issue with user authentication',
                'completed' => false,
            ],
            [
                'title' => 'Conduct user interviews',
                'description' => 'Schedule and perform interviews with 5 key users for feedback',
                'completed' => false,
            ],
            [
                'title' => 'Optimize database queries',
                'description' => 'Identify and improve slow-performing database operations',
                'completed' => false,
            ],
            [
                'title' => 'Write blog post',
                'description' => 'Draft a blog post about our latest feature release',
                'completed' => false,
            ],
            [
                'title' => 'Set up monitoring alerts',
                'description' => 'Configure alerting system for critical application metrics',
                'completed' => true,
            ],
        ];

        foreach ($tasks as $task) {
            DB::table('tasks')->insert([
                'title' => $task['title'],
                'description' => $task['description'],
                'completed' => $task['completed'],
                'task_categories_id' => $categoryIds[array_rand($categoryIds)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
