<?php

namespace Database\Seeders;

use App\Models\ServiceOffer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'service_request_id' => 1,
                'client_id' => 1,
                'client_request' => 'Web Consultant on Future Update',
                'offer' => 'IT Consultant with per hour charge',
                'estimated_price' => $estimated =  200000,
                'down_payment' => $estimated * 35 / 100,
                'status' => 'Pending'
            ],
            [
                'service_request_id' => 2,
                'client_id' => 1,
                'client_request' => 'Logo Redesign & Add New Feature on my Web',
                'offer' => 'Web Design & Development',
                'estimated_price' => $estimated = 200000,
                'down_payment' => $estimated * 35 / 100,
                'status' => 'Pending'
            ],


        ])->each(function ($serviceOffer) {
            ServiceOffer::create($serviceOffer);
        });
    }
}
