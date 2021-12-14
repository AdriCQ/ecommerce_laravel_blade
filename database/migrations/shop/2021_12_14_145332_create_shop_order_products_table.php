<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_order_products', function (Blueprint $table) {
            $table->foreignId('shop_order_id')->constrained('shop_orders');
            $table->foreignId('shop_product_id')->constrained('shop_products');
            $table->unsignedSmallInteger('qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_order_products');
    }
}
