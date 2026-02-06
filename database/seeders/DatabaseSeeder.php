<?php

namespace Database\Seeders;

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
        // Membuat User Admin Global UNPAB
        User::factory()->create([
            'name' => 'Admin Global UNPAB',
            'email' => 'admin@unpab.com',
            'password' => Hash::make('password'),
        ]);
        
        // Opsional: Tambahkan dummy user lain jika perlu
        // User::factory(10)->create();
    }
}