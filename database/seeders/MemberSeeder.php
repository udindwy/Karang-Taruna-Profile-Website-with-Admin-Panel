<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = [
            [
                'name' => 'John Doe',
                'position' => 'Ketua Karang Taruna',
                'photo' => 'images/membercowo.jpg',
            ],
            [
                'name' => 'Jane Doe',
                'position' => 'Sekretaris',
                'photo' => 'images/membercewe.png',
            ],
            [
                'name' => 'Budi Santoso',
                'position' => 'Bendahara',
                'photo' => 'images/membercowo.jpg',
            ],
            [
                'name' => 'Siti Aminah',
                'position' => 'Kepala Divisi Sosial',
                'photo' => 'images/membercewe.png',
            ],
            [
                'name' => 'Ahmad Fauzi',
                'position' => 'Kepala Divisi Olahraga',
                'photo' => 'images/membercowo.jpg',
            ],
            [
                'name' => 'Lina Wijaya',
                'position' => 'Anggota Divisi Kreatif',
                'photo' => 'images/membercewe.png',
            ],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}
