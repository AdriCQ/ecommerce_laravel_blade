<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppConfigsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('shop_configs', function (Blueprint $table) {
      $table->id();
      $table->string('name')->default('Mi Tienda');
      $table->text('description');
      // $table->string('logo_path');
      $table->string('currency')->default('USD');
      $table->boolean('open')->default(true);
      $table->string('address')->nullable();
      $table->string('phone')->nullable();
      $table->string('phone_extra')->nullable();
      $table->string('email')->nullable();
      $table->string('social_facebook')->nullable();
      $table->string('social_twitter')->nullable();
      $table->string('social_instagram')->nullable();
      $table->string('social_youtube')->nullable();
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
    Schema::dropIfExists('shop_configs');
  }
}
