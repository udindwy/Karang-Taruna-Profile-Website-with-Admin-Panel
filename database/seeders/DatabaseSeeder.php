<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            HeroSectionSeeder::class,
            AboutSectionSeeder::class,
            MemberSeeder::class,
            ProgramSeeder::class,
            GallerySeeder::class,
            NewsSeeder::class,
        ]);
    }
}
