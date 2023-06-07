<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaction = [
            ['verification' => '1', 'idCourse' => 1, 'idUser' => 1],
            ['verification' => '1', 'idCourse' => 2, 'idUser' => 1],
            ['verification' => '1', 'idCourse' => 1, 'idUser' => 2],
            ['verification' => '1', 'idCourse' => 2, 'idUser' => 2],

        ];

        DB::table('transactions')->insert($transaction);
    }
}
