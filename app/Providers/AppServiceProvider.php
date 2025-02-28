<?php

namespace App\Providers;
// ページ
use Illuminate\Pagination\Paginator;
// use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ページ
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // \URL::forceScheme('https');
        // pagenateするなら
        // $this->app['request']->server->set('HTTPS','on');

    }
}
