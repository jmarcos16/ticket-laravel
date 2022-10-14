<?php

namespace App\Providers;

use App\Contracts\TicketRepoInterface;
use App\Repositories\TicketRepository;
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
    $this->app->bind(TicketRepoInterface::class, TicketRepository::class);
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    //
  }
}
