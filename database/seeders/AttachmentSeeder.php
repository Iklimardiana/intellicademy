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
            ['assignment' => 'https://www.youtube.com/watch?v=YaM-Y8RT4us', 'idCourse' => 1, 'idModule' => 3, 'category' => '1', 'type' => '0', 'idUser' => '3', 'score' => null],
            ['assignment' => 'contoh.pdf', 'idCourse' => 1, 'idModule' => 1, 'category' => '0', 'type' => '0', 'idUser' => '3', 'score' => null],
            ['assignment' => 'contoh.pdf', 'idCourse' => 1, 'idModule' => 3, 'category' => '0', 'type' => '1', 'idUser' => '2', 'score' => null],
        ];

        DB::table('attachments')->insert($attachment);
    }
}
