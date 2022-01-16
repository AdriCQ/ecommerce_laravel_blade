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
      'password' => bcrypt('b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86'),
      'type' => 'ADMIN'
    ]);
  }
}
