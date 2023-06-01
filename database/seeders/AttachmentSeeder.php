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
            ['link' => 'notepad.com', 'idCourse' => 1, 'idModule' => 3, 'category' => '1', 'type' => '0', 'idUser' => '3', 'score' => null],
            ['link' => 'notepad.com', 'idCourse' => 1, 'idModule' => 3, 'category' => '1', 'type' => '1', 'idUser' => '1', 'score' => '90'],
        ];

        DB::table('attachments')->insert($attachment);
    }
}
