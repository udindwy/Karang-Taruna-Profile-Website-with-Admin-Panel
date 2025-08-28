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
        User::create([
            'name' => 'Admin Karang Taruna',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('lupapassword'),
            'email_verified_at' => now(),
        ]);
    }
}
