<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Andi',
            'password' => bcrypt('pelajar'),
            'email' => 'andi@gmail.com',
            'phone' => '082222222222',
            'role' => '2',
            'avatar' => null
        ]);
        User::create([
            'username' => 'Dian',
            'password' => bcrypt('pelajar'),
            'email' => 'pelajar@gmail.com',
            'phone' => '082222222222',
            'role' => '2',
            'avatar' => null
        ]);

        User::create([
            'username' => 'Iklima',
            'password' => bcrypt('iklima'),
            'email' => 'iklima@gmail.com',
            'phone' => '082222222222',
            'role' => '1',
            'avatar' => null
        ]);

        User::create([
            'username' => 'Mardiana',
            'password' => bcrypt('iklima'),
            'email' => 'diana@gmail.com',
            'phone' => '082222222222',
            'role' => '1',
            'avatar' => null
        ]);
    }
}
