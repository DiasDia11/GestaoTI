<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Interfaces\RepositoryInterface',
            'App\Repositories\PessoaRepository'
        );

        $this->app->bind(
            'App\Interfaces\RepositoryInterface',
            'App\Repositories\EquipamentosRepository'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
