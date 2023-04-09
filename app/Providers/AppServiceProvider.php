<?php

namespace App\Providers;

use App\Repositories\Interface\ListingInterface;
use App\Repositories\Repository\ListingRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->bind(ListingInterface::class,function(){
        return new ListingRepository;
       });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
