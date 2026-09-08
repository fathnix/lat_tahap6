<?php

namespace App\Providers;

use App\Repositories\AuthImplementsRepo;
use App\Repositories\CatRepoImplements;
use App\Repositories\Interfaces\AuthRepository;
use App\Repositories\Interfaces\CatRepository;
use App\Repositories\Interfaces\ProductRepository;
use App\Repositories\ProductRepoImplements;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepository::class, AuthImplementsRepo::class);
        $this->app->bind(CatRepository::class, CatRepoImplements::class);
        $this->app->bind(ProductRepository::class, ProductRepoImplements::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
