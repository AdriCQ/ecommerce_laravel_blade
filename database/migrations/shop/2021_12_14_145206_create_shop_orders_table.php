<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('shop_orders', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('address');
      $table->string('phone');
      // $table->string('email');
      $table->unsignedDecimal('total_price', 8, 2);
      $table->boolean('pay')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('shop_orders');
  }
}
