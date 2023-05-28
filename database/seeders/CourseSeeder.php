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
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam similique officia ipsum facilis a sint excepturi reiciendis doloremque eum iusto.',
            'thumbnail' => null,
            'idUser' => 3,
        ]);

        Course::create([
            'name' => 'AI for Intermediate',
            'price' => 50000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam similique officia ipsum facilis a sint excepturi reiciendis doloremque eum iusto.',
            'thumbnail' => null,
            'idUser' => 4,
        ]);
    }
}
