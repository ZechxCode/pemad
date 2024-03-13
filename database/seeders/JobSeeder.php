<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'project_id' => 1,
                'job_type_id' => 1,
                'title' => 'Landing Page Dev',
                'description' => 'Develop a new landing page',
                'status' => 'In Progress',
            ],
            [
                'project_id' => 1,
                'job_type_id' => 2,
                'title' => 'Logo Design',
                'description' => 'Design a new Company Logo',
                'status' => 'Completed',
            ],


        ])->each(function ($job) {
            Job::create($job);
        });
    }
}
