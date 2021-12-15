<?php

namespace Database\Seeders;

use App\Models\Shop\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::query()->insert([
            "name" => "MyAppName",
            "currency" => "CUP",
            "open" => false,
            "address" => "MyAppAddress",
            "phone" => "555555",
            "phone_extra" => "555555",
            "email" => "myemail@email.email"
        ]);
    }
}
