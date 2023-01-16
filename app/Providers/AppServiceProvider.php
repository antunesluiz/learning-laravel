<?php

namespace App\Providers;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Eloquents\ProductRepository;
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
        $this->app->bind(
            'App\Repositories\Contracts\ProductRepositoryInterface', 
            'App\Repositories\Eloquents\ProductRepository', 
        );
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
