<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'client_id' => 1,
                'service_offer_id' => 2,
                'name' => 'Web Design & Development',
                'description' => 'Web Design & Development for a small business website.',
                'status' => 'Waiting for Downpayment',
            ],


        ])->each(function ($project) {
            Project::create($project);
        });
    }
}
