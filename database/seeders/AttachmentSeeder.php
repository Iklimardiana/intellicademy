<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class AttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attachment = [
            ['assignment' => 'notepad.com', 'idCourse' => 1, 'idModule' => 3, 'category' => '1', 'type' => '0', 'idUser' => '3', 'score' => null],
            ['assignment' => 'youtube.com', 'idCourse' => 1, 'idModule' => 1, 'category' => '1', 'type' => '0', 'idUser' => '3', 'score' => null],
            ['assignment' => 'youtube.com', 'idCourse' => 2, 'idModule' => 4, 'category' => '1', 'type' => '0', 'idUser' => '4', 'score' => null],
        ];

        DB::table('attachments')->insert($attachment);
    }
}
