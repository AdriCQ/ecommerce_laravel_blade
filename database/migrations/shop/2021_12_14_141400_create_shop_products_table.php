<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('shop_products', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->unsignedDecimal('price', 8, 2);
      $table->unsignedMediumInteger('stock');
      $table->string('image');
      $table->string('gallery')->default('[]');
      $table->text('description');
      $table->unsignedInteger('purchases')->default(0);
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
    Schema::dropIfExists('shop_products');
  }
}
