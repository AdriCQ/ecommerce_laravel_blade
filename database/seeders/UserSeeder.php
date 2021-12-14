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
        User::query()->insert([
            'name' => 'Admin',
            'email' => 'email@email.com',
            'phone' => '555555',
            'password' => bcrypt('password'),
        ]);
    }
}
