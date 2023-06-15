<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'AI for Beginner',
            'price' => 50000,
            'description' => 'Kursus "AI for Beginner" adalah pengantar yang komprehensif ke dalam kecerdasan buatan, membantu pemula memahami konsep dasar dan aplikasi AI dalam lingkungan belajar yang ramah.',
            'thumbnail' => 'defaultThumbnail.png',
            'idUser' => 3,
        ]);

        Course::create([
            'name' => 'AI for Intermediate',
            'price' => 50000,
            'description' => 'Kursus "AI for Intermediate" melatih pemahaman lanjutan tentang kecerdasan buatan dengan teknik dan algoritma kompleks serta penerapan dalam skenario realistis.',
            'thumbnail' => 'defaultThumbnail.png',
            'idUser' => 4,
        ]);
    }
}
