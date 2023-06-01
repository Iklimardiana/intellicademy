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
            'firstName' => 'Andi',
            'lastName' => 'Andrea',
            'password' => bcrypt('pelajar'),
            'email' => 'andi@gmail.com',
            'phone' => '082222222222',
            'role' => '2',
            'avatar' => 'images/avatar/avatarDefault.png',
            'key' => null,
            'active' => '1',
        ]);
        User::create([
            'username' => 'Dian',
            'firstName' => 'Dian',
            'lastName' => 'Pratama',
            'password' => bcrypt('pelajar'),
            'email' => 'pelajar@gmail.com',
            'phone' => '082222222222',
            'role' => '2',
            'avatar' => 'images/avatar/avatarDefault.png',
            'key' => null,
            'active' => '1',
        ]);

        User::create([
            'username' => 'Iklima',
            'firstName' => 'Iklima',
            'lastName' => 'Mardiana',
            'password' => bcrypt('iklima'),
            'email' => 'iklima@gmail.com',
            'phone' => '082222222222',
            'role' => '1',
            'avatar' => 'images/avatar/avatarDefault.png',
            'key' => null,
            'active' => '1',
        ]);

        User::create([
            'username' => 'Mardiana',
            'firstName' => 'Iklima',
            'lastName' => 'Mardiana',
            'password' => bcrypt('iklima'),
            'email' => 'diana@gmail.com',
            'phone' => '082222222222',
            'role' => '1',
            'avatar' => 'images/avatar/avatarDefault.png',
            'key' => null,
            'active' => '1',
        ]);

        User::create([
            'username' => 'Admin',
            'firstName' => 'admin',
            'lastName' => 'intellycode',
            'password' => bcrypt('admin'),
            'email' => 'admin@gmail.com',
            'phone' => '082222222222',
            'role' => '0',
            'avatar' => 'images/avatar/avatarDefault.png',
            'key' => null,
            'active' => '1',
        ]);
    }
}
