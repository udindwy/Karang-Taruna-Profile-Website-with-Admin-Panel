<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutSection::create([
            'description' => 'Karang Taruna Lorem Ipsum merupakan organisasi kepemudaan yang aktif dalam berbagai kegiatan kemasyarakatan. Didirikan sejak tahun 2010, kami berkomitmen untuk menjadi pelopor perubahan positif di lingkungan desa.',
            'vision' => 'Terwujudnya pemuda yang berkarakter, berdaya saing, dan berjiwa sosial tinggi untuk kemajuan desa.',
            'mission' => 'Mengembangkan potensi pemuda melalui pelatihan dan workshop kreatif. 
            Mengadakan kegiatan sosial dan lingkungan secara rutin. 
            Menjalin sinergi dengan pemerintah desa dan lembaga lain.',
            'image' => 'images/tentangkami.jpg',
        ]);
    }
}
