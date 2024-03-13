<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'project_id' => 1,
                'client_id' => 1,
                'total_amount' => 200000,
                'due_date' => Carbon::now(),
                'status' => 'DownPayment',
            ],


        ])->each(function ($inv) {
            Invoice::create($inv);
        });
    }
}
