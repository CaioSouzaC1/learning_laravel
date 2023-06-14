<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{

    public $bindings = [
        \App\Repository\seriesRepository::class => \App\Repository\EloquentSeriesRepository::class
    ];

    /**
     * Register services.
     */
    // public function register(): void
    // {
    //     $this->app->bind(
    //         \App\Repository\seriesRepository::class,
    //         \App\Repository\EloquentSeriesRepository::class
    //     );
    // }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
