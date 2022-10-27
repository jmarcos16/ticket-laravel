<?php

namespace App\Providers;

use App\Contracts\TechnicalRepoInterface;
use App\Contracts\TicketRepoInterface;
use App\Repositories\TechnicalRepository;
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
    $this->app->bind(TechnicalRepoInterface::class, TechnicalRepository::class);
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
