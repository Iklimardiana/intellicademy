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
            'username' => 'Pelajar',
            'password' => bcrypt('pelajar'),
            'email' => 'pelajar@gmail.com',
            'phone' => '082222222222',
            'role' => '2',
            'avatar' => null
        ]);

        User::create([
            'username' => 'Mentor',
            'password' => bcrypt('Mentor'),
            'email' => 'mentor@gmail.com',
            'phone' => '082222222222',
            'role' => '1',
            'avatar' => null
        ]);
    }
}
