<?php

namespace Database\Seeders;

use App\Models\Shop\Destination;
use App\Models\Shop\Order;
use App\Models\Shop\OrderProduct;
use App\Models\Shop\Product;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $this->call([DatabaseSeeder::class]);

    $this->seedColaborators();
    $this->seedDestinations();
    $this->seedProducts();
    $this->seedOrders();
    $this->seedOrderProducts();
  }

  /**
   * seedColaborators
   */
  private function seedColaborators($limits = 10, $repeats = 1)
  {
    $faker = Factory::create();

    for ($r = 0; $r < $repeats; $r++) {
      $models = [];
      for ($l = 0; $l < $limits; $l++) {
        array_push($models, [
          'name' => $faker->name(),
          'email' => $faker->email,
          'phone' => '5' . $faker->numerify('#######'),
          'password' => bcrypt('password'),
          'type' => $faker->randomElement(['RASTREO', 'VENTAS', 'CONTACTO'])
        ]);
      }
      User::query()->insert($models);
    }
  }
  /**
   * seedDestinations
   */
  private function seedDestinations($limits = 10, $repeats = 1)
  {
    $faker = Factory::create();

    for ($r = 0; $r < $repeats; $r++) {
      $models = [];
      for ($l = 0; $l < $limits; $l++) {
        array_push($models, [
          'name' => $faker->address,
          'price' => $faker->randomFloat(2, 2, 100),
        ]);
      }
      Destination::query()->insert($models);
    }
  }
  /**
   * 
   */
  private function seedOrders($limits = 10, $repeats = 1)
  {
    $faker = Factory::create();

    for ($r = 0; $r < $repeats; $r++) {
      $models = [];
      for ($l = 0; $l < $limits; $l++) {
        array_push($models, [
          'name' => $faker->name(),
          'address' => $faker->address,
          'phone' => $faker->phoneNumber,
          'email' => $faker->email,
          'total_price' => $faker->numberBetween(0, 100)
        ]);
      }
      Order::query()->insert($models);
    }
  }
  /**
   * 
   */
  private function seedOrderProducts(int $repeats = 1)
  {
    $faker = Factory::create();
    for ($r = 0; $r < $repeats; $r++) {
      $models = [];
      for ($counter = 1; $counter <= Order::query()->count(); $counter++) {
        array_push($models, [
          'shop_order_id' => $counter,
          'shop_product_id' => $faker->numberBetween(1, Product::query()->count()),
          'qty' => $faker->numberBetween(1, 10)
        ]);
      }
      OrderProduct::query()->insert($models);
    }
  }
  /**
   * seedProducts
   */
  private function seedProducts($limits = 10, $repeats = 1)
  {
    $faker = Factory::create();

    for ($r = 0; $r < $repeats; $r++) {
      $models = [];
      for ($l = 0; $l < $limits; $l++) {
        array_push($models, [
          'name' => $faker->words(4, true),
          'description' => $faker->text(),
          'price' => $faker->numberBetween(0, 100),
          'stock' => $faker->numberBetween(1, 10),
          'image' => '/images/default.jpg'
        ]);
      }
      Product::query()->insert($models);
    }
  }
}
