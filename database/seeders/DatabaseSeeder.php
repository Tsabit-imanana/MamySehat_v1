<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);\
        User::create([
            'nama' => 'Admin User',
            'institusi' => 'Admin Institute',
            'email' => 'admin@example.com',
            'nik' => '1234567890123456',
            'wa' => '081234567890',
            'kota_asal' => 'Admin City',
            'profesi' => 'Administrator',
            'password' => Hash::make('adminpassword'),
            'role' => 'admin',
        ]);
    }
}
