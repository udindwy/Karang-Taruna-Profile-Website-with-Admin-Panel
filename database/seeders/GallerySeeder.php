<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker; // Import Faker

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID'); // Inisialisasi Faker di sini

        $photos = [
            'images/galeri.jpg',
            'images/galeri.jpg',
            'images/galeri.jpg',
            'images/galeri.jpg',
            'images/galeri.jpg',
            'images/galeri.jpg',
            'images/galeri.jpg',
            'images/galeri.jpg',
            'images/galeri.jpg',
        ];

        foreach ($photos as $photo) {
            Gallery::create([
                'image' => $photo,
                'caption' => 'Foto Kegiatan ' . $faker->sentence(3),
            ]);
        }
    }
}
