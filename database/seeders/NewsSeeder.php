<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $articles = [
            [
                'title' => 'Karang Taruna Mengadakan Lomba 17-an Peringati Kemerdekaan RI',
                'content' => 'Dalam rangka memperingati Hari Kemerdekaan RI ke-79, Karang Taruna Lorem Ipsum mengadakan berbagai lomba seru yang diikuti oleh seluruh warga desa. Acara berlangsung meriah dan penuh semangat kebersamaan di lapangan desa.',
                'image' => 'images/berita.jpg',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Pelatihan Keterampilan Digital untuk Pemuda Desa',
                'content' => 'Bekerja sama dengan startup lokal, Karang Taruna Lorem Ipsum menyelenggarakan pelatihan digital marketing untuk membantu UMKM desa meningkatkan penjualan secara online. Acara ini disambut antusias oleh para peserta.',
                'image' => 'images/berita.jpg',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Kerja Bakti Bersihkan Sungai Desa, Wujud Peduli Lingkungan',
                'content' => 'Ratusan pemuda dan warga desa bergotong-royong membersihkan sungai dari sampah dan tumpukan lumpur. Kegiatan ini sebagai wujud nyata kepedulian terhadap kebersihan lingkungan dan kelestarian alam.',
                'image' => 'images/berita.jpg',
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Pentas Seni Budaya Lokal Meriahkan Malam Minggu Desa',
                'content' => 'Acara pentas seni tahunan yang diadakan oleh Karang Taruna sukses besar. Berbagai pertunjukan mulai dari tari tradisional hingga musik modern ditampilkan, menarik perhatian seluruh warga desa.',
                'image' => 'images/berita.jpg',
                'published_at' => now()->subDays(30),
            ],
            [
                'title' => 'Pembagian Sembako untuk Warga Kurang Mampu',
                'content' => 'Sebagai bentuk kepedulian sosial, Karang Taruna menyalurkan bantuan sembako kepada keluarga kurang mampu. Kegiatan ini diharapkan dapat meringankan beban hidup mereka dan mempererat tali silaturahmi.',
                'image' => 'images/berita.jpg',
                'published_at' => now()->subDays(45),
            ],
            [
                'title' => 'Gotong Royong Bangun Pos Ronda Baru',
                'content' => 'Anggota Karang Taruna bersama warga bahu-membahu membangun pos ronda baru untuk meningkatkan keamanan lingkungan. Semangat kebersamaan terlihat jelas dalam setiap tahapan pembangunan.',
                'image' => 'images/berita.jpg',
                'published_at' => now()->subDays(60),
            ],
            [
                'title' => 'Workshop Fotografi Dasar untuk Pemula',
                'content' => 'Sebuah workshop singkat tentang dasar-dasar fotografi diadakan untuk pemuda yang tertarik dengan dunia visual. Acara ini bertujuan untuk mengasah kreativitas dan bakat terpendam.',
                'image' => 'images/berita.jpg',
                'published_at' => now()->subDays(75),
            ],
            [
                'title' => 'Pelatihan Pembuatan Kompos dari Sampah Organik',
                'content' => 'Karang Taruna mengadakan pelatihan pembuatan kompos untuk mengajak warga mengolah sampah organik menjadi pupuk yang bermanfaat. Kegiatan ini merupakan bagian dari program peduli lingkungan.',
                'image' => 'images/berita.jpg',
                'published_at' => now()->subDays(90),
            ],
            [
                'title' => 'Sosialisasi Pentingnya Pendidikan Anak Usia Dini',
                'content' => 'Dengan menghadirkan narasumber ahli, Karang Taruna mengadakan sosialisasi mengenai pentingnya pendidikan anak usia dini bagi masa depan generasi penerus bangsa.',
                'image' => 'images/berita.jpg',
                'published_at' => now()->subDays(120),
            ],
        ];

        foreach ($articles as $article) {
            News::create($article);
        }
    }
}
