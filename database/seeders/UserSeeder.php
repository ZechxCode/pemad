<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // collect([
        //     [
        //         'name' => 'Admin',
        //         'email' => 'admin@email.com',
        //         'password' => Hash::make('password'),
        //         'is_admin' => 1,
        //     ],
        // ])->each(function ($user) {
        //     User::create($user);
        // });


        // Menambahkan user admin
        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
            'is_admin' => 1,
        ]);

        // Menambahkan user client
        $clientUser = User::create([
            'name' => 'Klien',
            'email' => 'klien@email.com',
            'password' => Hash::make('password'),
            'is_admin' => 0,
        ]);

        // Menambahkan profil client menggunakan ID dari user client yang baru dibuat
        $clientProfile = Client::create([
            'user_id' => $clientUser->id,
            'name' => $clientUser->name,
            'contact_info' => 'Kontak Klien',
            // Anda bisa menambahkan field lain yang diperlukan
        ]);
    }
}
