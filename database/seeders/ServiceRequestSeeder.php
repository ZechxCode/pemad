<?php

namespace Database\Seeders;

use App\Models\ServiceRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'client_id' => 1,
                'project_ref' => 0,
                'description' => 'Web Consultant on Future Update',
                'status' => 'Pending',
            ],
            [
                'client_id' => 1,
                'project_ref' => 0,
                'description' => 'Logo Redesign & Add New Feature on my Web',
                'status' => 'In Review',
            ],

        ])->each(function ($serviceReq) {
            ServiceRequest::create($serviceReq);
        });
    }
}
