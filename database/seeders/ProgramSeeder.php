<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programs = [
            [
                'title' => 'Pelatihan Keterampilan Digital',
                'description' => 'Mengadakan workshop rutin untuk meningkatkan literasi digital dan keterampilan coding bagi pemuda desa.',
                'photo' => 'images/kegiatan.jpg',
            ],
            [
                'title' => 'Kerja Bakti Lingkungan',
                'description' => 'Kegiatan gotong royong membersihkan area desa, selokan, dan fasilitas umum setiap bulan.',
                'photo' => 'images/kegiatan.jpg',
            ],
            [
                'title' => 'Turnamen Olahraga Antar RW',
                'description' => 'Menyelenggarakan turnamen futsal dan bulu tangkis untuk mempererat persaudaraan antarwarga desa.',
                'photo' => 'images/kegiatan.jpg',
            ],
            [
                'title' => 'Bakti Sosial Bencana Alam',
                'description' => 'Penggalangan dana dan bantuan untuk korban bencana alam di wilayah sekitar.',
                'photo' => 'images/kegiatan.jpg',
            ],
            [
                'title' => 'Pentas Seni & Budaya',
                'description' => 'Mengadakan acara pentas seni tahunan untuk menampilkan bakat dan melestarikan budaya lokal.',
                'photo' => 'images/kegiatan.jpg',
            ],
            [
                'title' => 'Gerakan Menanam Pohon',
                'description' => 'Inisiatif penghijauan desa dengan mengajak masyarakat menanam pohon di lahan kosong dan area publik.',
                'photo' => 'images/kegiatan.jpg',
            ],
            [
                'title' => 'Pelatihan Kewirausahaan Pemuda',
                'description' => 'Memberikan bekal pengetahuan dan keterampilan bisnis kepada pemuda agar dapat menciptakan peluang usaha mandiri.',
                'photo' => 'images/kegiatan.jpg',
            ],
            [
                'title' => 'Sosialisasi Bahaya Narkoba',
                'description' => 'Mengadakan penyuluhan dan kampanye untuk meningkatkan kesadaran pemuda akan bahaya narkoba dan pergaulan bebas.',
                'photo' => 'images/kegiatan.jpg',
            ],
            [
                'title' => 'Kelas Literasi Anak',
                'description' => 'Menyelenggarakan kelas baca dan bimbingan belajar gratis untuk anak-anak di lingkungan desa.',
                'photo' => 'images/kegiatan.jpg',
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
