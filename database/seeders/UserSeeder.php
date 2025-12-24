<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Administrator YPI',
            'email' => 'admin@yayasanpi.ac.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Sample Student User
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'student@example.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
        ]);
    }
}
