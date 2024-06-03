<?php

declare(strict_types=1);

namespace DragonCode\LaravelHttpUserAgent;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/http.php', 'http');
    }

    public function boot(): void
    {
        $this->bootConfigPublishes();
        $this->bootUserAgent();
    }

    protected function bootUserAgent(): void
    {
        Http::globalOptions([
            'headers' => [
                'User-Agent' => config('http.global.user_agent'),
            ],
        ]);
    }

    protected function bootConfigPublishes(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/http.php' => $this->app->configPath('http.php'),
            ], 'config');
        }
    }
}
