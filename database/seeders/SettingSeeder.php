<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Karang Taruna Lorem Ipsum',
                'logo' => 'images/logo.png',
                'address' => 'Jl. Pahlawan No. 1, Desa Makmur, Kec. Sejahtera, 55161',
                'phone' => '081234567890',
                'email' => 'info@karangtaruna.com',
                'facebook' => 'https://www.facebook.com/karangtaruna',
                'instagram' => 'https://www.instagram.com/karangtaruna',
                'youtube' => 'https://www.youtube.com/karangtaruna',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
