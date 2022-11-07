<?php

namespace App\Providers;

use App\Contracts\TicketRepoInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\TicketRepository;
use App\Repositories\UserRepository;
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
    $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
