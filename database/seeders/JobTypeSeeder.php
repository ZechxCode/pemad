<?php

namespace Database\Seeders;

use App\Models\Job_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'Development',
                'description' => 'Software Development ( Mobile & Web Desktop )',
            ],
            [
                'name' => 'Design',
                'description' => 'Graphic Design ( UIUX )',
            ],


        ])->each(function ($jobType) {
            Job_type::create($jobType);
        });
    }
}
