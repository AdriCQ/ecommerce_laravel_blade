<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }
  /**
   * Register any application services.
   *
   * @return void
   */
  public function boot()
  {
    Blade::withoutDoubleEncoding();
    // Register migrations
    $this->setDbPaths();
  }

  /**
   * setDbPaths
   */
  private function setDbPaths()
  {
    $MODULES = ['laravel', 'shop', 'users', 'notifications'];
    $MIGRATIONS_FOLDER = [];
    for ($i = 0; $i < count($MODULES); $i++) {
      $MIGRATIONS_FOLDER[$i] = 'database/migrations/' . $MODULES[$i];
    }
    // Core
    $this->loadMigrationsFrom($MIGRATIONS_FOLDER);
  }
}
