<?php

namespace Database\Seeders;

use App\Models\PurchaseDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'project_id' => 1,
                'title' => 'Landing Page Dev',
                'description' => 'Develop a new landing page',
                'price' => 100000,
            ],
            [
                'project_id' => 1,
                'title' => 'Logo Design',
                'description' => 'Design a new Company Logo',
                'price' => 100000,
            ],


        ])->each(function ($purchaseDet) {
            PurchaseDetail::create($purchaseDet);
        });
    }
}
