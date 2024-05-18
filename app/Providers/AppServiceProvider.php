<?php

namespace App\Providers;

use App\Http\Integrations\Mastodon\Mastodon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(Mastodon::class)
            ->needs('$instanceUrl')
            ->giveConfig('mastodon.instance_url');

        $this->app->when(Mastodon::class)
            ->needs('$accessToken')
            ->giveConfig('mastodon.access_token');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
