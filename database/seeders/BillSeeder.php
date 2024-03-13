<?php

namespace Database\Seeders;


use App\Models\Bill;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'invoice_id' => 1,
                'company_reference_id' => 1,
                'status' => 'Down-Payment (DP)',
                'amount_paid' => 70000,
                'proof_of_payment' => 'ss.jpg',
            ],


        ])->each(function ($pay) {
            Bill::create($pay);
        });
    }
}
