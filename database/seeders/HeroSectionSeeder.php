<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HeroSection::create([
            'title' => 'Mengukir Karya, Membangun Generasi Mandiri',
            'subtitle' => 'Kami adalah wadah bagi pemuda-pemudi desa untuk berkontribusi aktif dalam pembangunan sosial dan budaya.',
            'image' => 'images/bg.jpg',
        ]);
    }
}
