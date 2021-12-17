<?php

namespace Database\Seeders;

use App\Models\Shop\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::query()->insert([
            'name' => 'ProductName',
            'description' => 'ProductDescription',
            'price' => 20,
            'stock' => 20,
            'gallery' => json_encode([]),
            'image' => '/images/default.jpg'
        ]);
    }
}
