<?php

namespace Database\Seeders;

use Database\Seeders\PartnerSeeder;
use Database\Seeders\ProgramSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Membuat User Admin Global UNPAB
        // Menggunakan updateOrCreate agar aman jika dijalankan berulang (idempotent)
        User::updateOrCreate(
            ['email' => 'admin@unpab.com'], // Cek berdasarkan email
            [
                'name' => 'Admin Global UNPAB',
                'password' => Hash::make('password'),
            ]
        );
        
        // 2. Menjalankan Seeder Lainnya
        $this->call([
            PartnerSeeder::class,
            ProgramSeeder::class,
        ]);
    }
}