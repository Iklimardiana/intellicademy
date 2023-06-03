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
            ['name' => 'Apa itu AI', 'body' => 'lorem', 'idCourse' => 1, 'sequence' => 1],
            ['name' => 'Manfaat AI', 'body' => 'lorem', 'idCourse' => 1, 'sequence' => 2],
            ['name' => 'Skenario AI', 'body' => 'lorem', 'idCourse' => 1, 'sequence' => 3],
            ['name' => 'AI Lebih Jauh', 'body' => 'lorem', 'idCourse' => 2, 'sequence' => 1],
            ['name' => 'Cara Merancang AI AI', 'body' => 'lorem', 'idCourse' => 2, 'sequence' =>2],
        ];

        DB::table('modules')->insert($module);
    }
}
