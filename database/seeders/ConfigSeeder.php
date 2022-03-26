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
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, adipisci, suscipit ut repellat voluptatum reprehenderit nihil doloremque impedit ullam velit debitis, soluta nam expedita mollitia incidunt atque dolorum architecto. Tempore.",
            "currency" => "BTC",
            "open" => false,
            "address" => "MyAppAddress",
            "phone" => "555555",
            "phone_extra" => "555555",
            "email" => "myemail@email.email"
        ]);
    }
}
