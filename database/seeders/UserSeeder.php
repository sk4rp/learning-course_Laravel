<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run() {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'role' => 0,
            'password' => bcrypt('user')
        ]);

    }
}
