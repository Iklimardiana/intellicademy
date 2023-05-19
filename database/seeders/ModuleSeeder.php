<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = [
            ['name' => 'Apa itu AI', 'idCourse' => 1],
            ['name' => 'Manfaat AI', 'idCourse' => 1],
            ['name' => 'Skenario AI', 'idCourse' => 1],
            ['name' => 'AI Lebih Jauh', 'idCourse' => 2],
            ['name' => 'Cara Merancang AI AI', 'idCourse' => 2],
        ];

        DB::table('modules')->insert($module);
    }
}
