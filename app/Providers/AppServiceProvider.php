<?php

namespace App\Providers;

use App\Repositories\TicketRepository;
use App\Repositories\BookingRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\Contracts\TicketRepositoryInterface;
use App\Repositories\Contracts\BookingRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TicketRepositoryInterface::class,TicketRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class,CategoryRepository::class);
        $this->app->singleton(BookingRepositoryInterface::class,BookingRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
