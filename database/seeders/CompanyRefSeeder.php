<?php

namespace Database\Seeders;

use App\Models\CompanyReference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyRefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'company_name' => 'ABC Corp',
                'bank_account' => 'BSI : 83248199',
                'email' => 'abccorp@email.com',
                'address' => 'Yogyakarta,Indonesia',
            ],
            // [
            //     'company_name' => 'XBJ Priss',
            //     'bank_account' => 'BRI : 29348923112',
            //     'email' => 'xbj11@email.com',
            //     'address' => 'Jakarta,Indonesia',
            // ],


        ])->each(function ($companyRef) {
            CompanyReference::create($companyRef);
        });
    }
}
